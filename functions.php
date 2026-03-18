<?php
/**
 * MBNL Theme functions
 */

// ─── Autoload Composer (Carbon Fields) ──────────────────────
$mbnl_autoload = get_template_directory() . '/vendor/autoload.php';
if ( file_exists( $mbnl_autoload ) ) {
    require_once $mbnl_autoload;
}

// ─── Theme Setup ────────────────────────────────────────────
function mbnl_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );

    register_nav_menus( array(
        'primary' => __( 'Menu principal', 'mbnl' ),
    ) );
}
add_action( 'after_setup_theme', 'mbnl_setup' );

// ─── Boot Carbon Fields ─────────────────────────────────────
add_action( 'after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
} );

// ─── Register Carbon Fields blocks ──────────────────────────
add_action( 'carbon_fields_register_fields', function () {
    $blocks_dir = get_template_directory() . '/acf-fields/';
    foreach ( glob( $blocks_dir . '*.php' ) as $file ) {
        require_once $file;
    }
} );

// ─── Register custom block category "Sections MBNL" ────────
function mbnl_block_categories( $categories ) {
    return array_merge(
        array(
            array(
                'slug'  => 'mbnl-sections',
                'title' => __( 'Sections MBNL', 'mbnl' ),
                'icon'  => 'layout',
            ),
        ),
        $categories
    );
}
add_filter( 'block_categories_all', 'mbnl_block_categories', 10, 1 );

// ─── Enqueue Styles & Scripts ───────────────────────────────
function mbnl_enqueue_assets() {
    // Google Fonts — Montserrat
    wp_enqueue_style( 'mbnl-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap', array(), null );

    // Main CSS
    wp_enqueue_style( 'mbnl-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

    // Theme stylesheet (WP requirement)
    wp_enqueue_style( 'mbnl-theme', get_stylesheet_uri(), array( 'mbnl-style' ), '1.0.0' );

    // AOS (scroll reveal animations)
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.4/dist/aos.css', array(), '2.3.4' );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.4/dist/aos.js', array(), '2.3.4', true );

    // Lucide icons
    wp_enqueue_script( 'lucide', 'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js', array(), null, true );

    // Main JS
    wp_enqueue_script( 'mbnl-main', get_template_directory_uri() . '/assets/js/main.js', array( 'aos-js', 'lucide' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mbnl_enqueue_assets' );

// ─── Nav Walkers ────────────────────────────────────────────

/**
 * Walker desktop : <ul> → liens .nav-link avec sous-menu dropdown
 */
class MBNL_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav-dropdown">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item    = $data_object;
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes );
        $is_current   = in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes );

        $li_class = 'nav-item';
        if ( $has_children ) $li_class .= ' has-dropdown';
        if ( $is_current )   $li_class .= ' active';

        $output .= '<li class="' . esc_attr( $li_class ) . '">';

        $link_class = $depth === 0 ? 'nav-link' : 'nav-dropdown-link';
        $attr_href  = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $attr_title = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $aria       = $has_children ? ' aria-haspopup="true" aria-expanded="false"' : '';

        $output .= '<a href="' . $attr_href . '" class="' . esc_attr( $link_class ) . '"' . $attr_title . $aria . '>';
        $output .= esc_html( $item->title );
        if ( $has_children && $depth === 0 ) {
            $output .= '<svg class="dropdown-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>';
        }
        $output .= '</a>';
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/**
 * Walker mobile : liens .nav-mobile-link avec sous-éléments indentés
 */
class MBNL_Mobile_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="nav-mobile-sub">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item       = $data_object;
        $link_class = $depth === 0 ? 'nav-mobile-link' : 'nav-mobile-sub-link';
        $attr_href  = ! empty( $item->url ) ? esc_url( $item->url ) : '#';

        $output .= '<li>';
        $output .= '<a href="' . $attr_href . '" class="' . esc_attr( $link_class ) . '">' . esc_html( $item->title ) . '</a>';
    }

    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

// ─── Excerpt length ─────────────────────────────────────────
function mbnl_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mbnl_excerpt_length' );
// ─── SVG Icon Helper ────────────────────────────────────
function mbnl_get_icon( $name, $size = 20 ) {
    $name = esc_attr( $name );
    $size = (int) $size;
    return sprintf(
        '<i data-lucide="%s" width="%d" height="%d" stroke-width="1.5" aria-hidden="true"></i>',
        $name,
        $size,
        $size
    );
}