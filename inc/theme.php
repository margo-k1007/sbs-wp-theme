<?php
/**
 * Theme Settings
 *
 * @package sbs
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sbs_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function sbs_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on sbs, use a find and replace
         * to change 'sbs' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'sbs', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Primary Menu', 'sbs' ),
                'menu-2' => esc_html__( 'Footer Menu', 'sbs' ),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'sbs_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 205,
                'width'       => 50,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'sbs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sbs_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'sbs_content_width', 640 );
}
add_action( 'after_setup_theme', 'sbs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sbs_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'sbs' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'sbs' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar(array(
        'name' => esc_html__( 'First Footer Widget Area', 'sbs' ),
        'id' => 'footer-widget-area-first',
        'description' => 'First Footer Widget Area',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => "</h4>\n",
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Second Footer Widget Area', 'sbs' ),
        'id' => 'footer-widget-area-second',
        'description' => 'Second Footer Widget Area',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => "</h4>\n",
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Third Footer Widget Area', 'sbs' ),
        'id' => 'footer-widget-area-third',
        'description' => 'Third Footer Widget Area',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => "</h4>\n",
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Fourth Footer Widget Area', 'sbs' ),
        'id' => 'footer-widget-area-fourth',
        'description' => 'Fourth Footer Widget Area',
        'class' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => "</h4>\n",
    ));
}
add_action( 'widgets_init', 'sbs_widgets_init' );


/* ==========================================================================
 *  Enqueue scripts and styles.
 * ========================================================================== */
function sbs_scripts() {
    $buildDirectory      = get_stylesheet_directory() . '/resources/dist/';
    $styleDirectory      = $buildDirectory;
    $scriptDirectory     = $buildDirectory;
    $buildDirectoryURI   = get_stylesheet_directory_uri() . '/resources/dist/';
    $styleDirectoryURI   = $buildDirectoryURI;
    $scriptDirectoryURI  = $buildDirectoryURI;


    // STYLES
//    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css', array(), true);
//    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/resources/dist/main.css', array(), true);

    wp_enqueue_style('theme-style',
        $styleDirectoryURI . 'main.css',
        array(),
        filemtime($styleDirectory . 'main.css')
    );

    // SCRIPTS

    /* Add Theme Scripts */
    wp_enqueue_script('slick-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery'), true, true );
    wp_enqueue_script('wow-scripts', get_stylesheet_directory_uri() . '/assets/js/wow.min.js', array( 'jquery'), true, true );
//    wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/resources/dist/main.js', array( 'jquery' ), true, true );
    wp_enqueue_script('theme-scripts',
        $scriptDirectoryURI . 'main.js',
        array( 'jquery' ),
        filemtime($scriptDirectory . 'main.js'),
        true
    );
//    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), true, true );
}
add_action( 'wp_enqueue_scripts', 'sbs_scripts' );


/* ==========================================================================
 *  Debug Tool
 * ========================================================================== */
if(!function_exists('pre')) {
    function pre($var){
        print "<pre>"; print_r($var); print "</pre>";
    }
}


/* ==========================================================================
 *  Delete Type Attr From Scripts (Disable W3C Validator Warning)
 * ========================================================================== */
add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('wp_print_footer_scripts ', 'sj_remove_type_attr', 10, 2);

function sj_remove_type_attr($tag) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}


/* ==========================================================================
 *  Add Footer Scripts
 * ========================================================================== */
function add_footer_scripts(){ ?>

    <!--    <div class="fb-page"></div>-->
<!--    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>-->

<?php }

//add_action('wp_footer', 'add_footer_scripts');

/* ==========================================================================
 *  Allow SVG through WordPress Media Uploader
 * ========================================================================== */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/* ==========================================================================
 *  CF7 Remove Tag <p>
 * ========================================================================== */
add_filter('wpcf7_autop_or_not', '__return_false');

/* ==========================================================================
 *  Remove Block Library CSS
 * ========================================================================== */
function sbs_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'sbs_remove_wp_block_library_css' );

/* ==========================================================================
 *  Ajax Filter
 * ========================================================================== */
add_action( 'wp_ajax_get_projects', 'get_projects_function' );
add_action( 'wp_ajax_nopriv_get_projects', 'get_projects_function' );

function get_projects_function() {
    if ( isset($_POST) ) {
        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            $service = $_POST['service'];
            $category = $_POST['category'];

            $args = array(
                'posts_per_page' => 6,
                'post_type' => 'case-studies',
                'post_status' => 'publish',
                'orderby' => 'date',
                'tax_query' => array(
                    'relation' => 'AND',
                )
            );

            if ($service) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-service',
                    'field' => 'id',
                    'terms' => $service,
                );
            }

            if ($category) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-category',
                    'field' => 'id',
                    'terms' => $category,
                );
            }

            $query = new WP_Query( $args );

            $max_num_pages = $query->max_num_pages;

            ob_start();

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
                    get_template_part('template-parts/case-studies-page/project');
                endwhile;
            else:
                echo '<h6>' . __('Projects not found', 'sbs') . '</h6>';
            endif;

            $data = ob_get_clean();

            $response = array(
                'success' => true,
                'max_num_pages' => $max_num_pages,
                'data' => $data
            );

            echo json_encode($response);
            wp_die();
        }
        die();
    }
}

add_action( 'wp_ajax_get_more_projects', 'get_more_projects_function' );
add_action( 'wp_ajax_nopriv_get_more_projects', 'get_more_projects_function' );

function get_more_projects_function() {
    if ( isset($_POST) ) {
        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            $service = $_POST['service'];
            $category = $_POST['category'];
            $page = $_POST['page'];

            $args = array(
                'posts_per_page' => 6,
                'paged' => $page,
                'post_type' => 'case-studies',
                'post_status' => 'publish',
                'orderby' => 'date',
                'tax_query' => array(
                    'relation' => 'AND',
                )
            );

            if ($service) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-service',
                    'field' => 'id',
                    'terms' => $service,
                );
            }

            if ($category) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'case-studies-category',
                    'field' => 'id',
                    'terms' => $category,
                );
            }

            $query = new WP_Query( $args );

            $max_num_pages = $query->max_num_pages;

            ob_start();

            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) :
                    $query->the_post();
                    get_template_part('template-parts/case-studies-page/project');
                endwhile;
            else:
                echo '<h6>' . __('Projects not found', 'sbs') . '</h6>';
            endif;

            $data = ob_get_clean();

            $response = array(
                'success' => true,
                'max_num_pages' => $max_num_pages,
                'data' => $data
            );

            echo json_encode($response);
            wp_die();
        }
        die();
    }
}