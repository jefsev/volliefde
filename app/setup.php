<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
* Register custom post types
*/

add_action('init', function () {
    $p_labels = [
        'name'              => 'Lessen',
        'singular_name'     => 'Les',
        'add_new'           => 'Nieuw les',
        'edit_item'         => 'Les aanpassen',
    ];
    register_post_type('lessen', [
        'labels'            => $p_labels,
        'public'            => true,
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-calendar-alt',
        'supports'          => array('title', 'thumbnail'),
        'position'          => '4',
    ]);

    $d_labels = [
        'name'              => 'Lesdagen',
        'singular_name'     => 'Lesdag',
        'add_new'           => 'Nieuw lesdag',
        'edit_item'         => 'Lesdag aanpassen',
    ];
    register_post_type('lesdagen', [
        'labels'            => $d_labels,
        'public'            => true,
        'has_archive'       => false,
        'menu_icon'         => 'dashicons-calendar-alt',
        'supports'          => array('title', 'thumbnail'),
        'position'          => '4',
    ]);

    $b_labels = [
        'name'              => 'Blog',
        'singular_name'     => 'Blog',
        'add_new'           => 'Nieuw blog',
        'edit_item'         => 'Blog aanpassen',
    ];
    register_post_type('blog', [
        'labels'            => $b_labels,
        'public'            => true,
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-calendar-alt',
        'supports'          => array('title', 'thumbnail', 'author', 'editor'),
        'position'          => '4',
    ]);
});

add_action('acf/init', function() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        acf_add_options_page(array(
            'page_title'        => __('Footer'),
            'menu_title'        => __('Footer'),
            'menu_slug'         => 'footer-instellingen',
            'update_button'     => 'Bewaar footer',
            'updated_message'   => 'Footer opgeslagen',
            'position'          => '4.1',
            'capability'        => 'edit_posts',
            'redirect'          => false
        ));

        acf_add_options_page(array(
            'page_title'        => __('Lessen overzicht'),
            'menu_title'        => __('lessen pagina'),
            'menu_slug'         => 'lessen-archief-page',
            'parent_slug'	=> 'edit.php?post_type=lessen',
        ));
    }
});

/**
 * Initialize ACF Builder
 */
add_action('init', function () {
    collect(glob(config('theme.dir').'/app/fields/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});

// Gravit forms after payment

add_action( 'gform_post_payment_completed', function($entry, $action) {

    // store submission data
    $type = $action[ 'type' ];
    $entryId = $action[ 'entry_id' ];

    if ($type == 'complete_payment') {

        //Get GF entry object to extract data
        $entry = \GFAPI::get_entry( $entryId );
        $firstName = rgar( $entry, '3' );
        $lastName = rgar( $entry, '4' );
        $email = rgar( $entry, '5' );
        $phone = rgar( $entry, '6' );
        $postIds = rgar( $entry, '13' );
        // create array from textarea input
        $daysIds = explode(',', $postIds);

        if ($daysIds > 0) {

            foreach ($daysIds as $dayId) {
                        // Update ACF rows
                $row = array(
                    'naam'   => $firstName . ' ' . $lastName,
                    'email'   => $email,
                    'telefoon' => $phone,
                    'type' => 'normaal',
                );

                add_row('inschrijvingen', $row, $dayId);
            }
        }
    } 
}, 10, 2 );

add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
    $payment = rgar( $entry, 'payment_status' );

    if ( $form['id'] == '1' || $form['id'] == '2' || $form['id'] == '3' ) 
    {
        if ($payment == 'Paid'){
            $confirmation = array( 'redirect' => '/betaling-gelukt/' );
        } else {
            $confirmation = array( 'redirect' => '/betaling-mislukt/' );
        }
    }

    return $confirmation;

}, 10, 4 );
