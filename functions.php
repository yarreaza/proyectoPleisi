<?php
function enqueue_my_scripts() {

    $jquery_src = get_template_directory_uri() . '/js/jquery.min.js';
    wp_deregister_script('jquery');
    wp_register_script('jquery', $jquery_src, FALSE, '1.11.0', FALSE);
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array('jquery'),'', true);
    wp_enqueue_script( 'bootpag-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'', false);
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'),'', true);
    wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'),'', true);
    wp_enqueue_script( 'validationEngine', get_template_directory_uri() . '/js/jquery.validationEngine.js', array('jquery'),'', true);
    wp_enqueue_script( 'validationEngine-es', get_template_directory_uri() . '/js/jquery.validationEngine-es.js', array('jquery'),'', true);
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'),'', true);
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'),'', false);
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.9.1',  true);
}

add_action('wp_enqueue_scripts', 'enqueue_my_scripts');
function enqueue_my_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme.min', get_template_directory_uri(). '/css/bootstrap-theme.min.css');
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style( 'font', get_template_directory_uri() . '/css/font-awesome.min.css'); 
    wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style( 'owl.theme.default', get_template_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_style( 'owl.transitions.css', get_template_directory_uri() . '/css/owl.transitions.css');
    wp_enqueue_style( 'validationEngine', get_template_directory_uri() . '/css/validationEngine.jquery.css');
    wp_enqueue_style( 'mediaqueries', get_template_directory_uri() . '/css/mediaqueries.css');
}
add_action('wp_enqueue_scripts', 'enqueue_my_styles');


function wiboo_theme_features() {
    load_theme_textdomain('tmb', get_template_directory() . '/languages');
    $formats = array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat',);
    add_theme_support('post-formats', $formats);
    add_theme_support('post-thumbnails');
    $markup = array('search-form', 'comment-form', 'comment-list',);
    add_theme_support('html5', $markup);
}
add_action('after_setup_theme', 'wiboo_theme_features');

// Register Metaboxes
add_filter('rwmb_meta_boxes', 'rw_register_meta_boxes');
function rw_register_meta_boxes($meta_boxes) {
    if (!class_exists('RW_Meta_Box') or ! is_admin())
        return;
    $post_id = !empty($_POST['post_ID']) ?
        $_POST['post_ID'] :
    (!empty($_GET['post']) ? $_GET['post'] : FALSE);
    $current_post = get_post($post_id);
    $current_post_type = $current_post->post_type;

    $meta_boxes[] = array(
        'id' => 'curr',
        'title' => 'Currency Info',
        'pages' => array('countries'), 
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => 'Currency Code',
                'id' => 'currc',
                'type' => 'image',
            )
        ));
    if ($current_post->post_name == 'contacto') {
        $meta_boxes[] = array(
            'id' => 'datos',
            'title' => 'Datos de la Empresa',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Dirección',
                    'id' => 'dir',
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'Coordenadas de Google Maps',
                    'id' => 'coord',
                    'type' => 'image',
                )
            ));
    }

       if ($current_post->post_name == 'como-funciona-pleisi') { 
        $meta_boxes[] = array(
            'id' => 'datos',
            'title' => 'Cómo Funciona Pleisi',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => 'Breve descripción',
                    'id' => 'breveDescripcion',
                    'type' => 'wysiwyg'
                ),
                array(
                    'name' => 'Video',
                    'id' => 'video',
                    'type' => 'textarea'
                ),

                array(
                    'name' => 'Patrones',
                    'id' => 'patrones',
                    'type' => 'textarea'
                ),

                array(
                    'name' => 'Consulta',
                    'id' => 'consulta',
                    'type' => 'textarea'
                )
            ));
    }
        $meta_boxes[] = array(
        'id' => 'desc',
        'title' => 'Contenidio',
        'pages' => array('cursos'), 
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
         
            array(
                'name' => 'Capacidad',
                'id' => 'capacidad',
                'type' => 'text'
            ),
            array(
                'name' => 'Duración',
                'id' => 'duracion',
                'type' => 'text'
            ),
            array(
                'name' => 'Precio',
                'id' => 'precio',
                'type' => 'text'
            ),
        ));

    return $meta_boxes;
}

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_banner::::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

function custom_post_type_banner() {

    $labels = array(
        'name'                => _x( 'Banner', 'Post Type General Name', 'pleisi' ),
        'singular_name'       => _x( 'Banner', 'Post Type Singular Name', 'pleisi' ),
        'menu_name'           => __( 'Banner', 'pleisi' ),
        'name_admin_bar'      => __( 'Post Type', 'pleisi' ),
        'parent_item_colon'   => __( 'Item Superior:', 'pleisi' ),
        'all_items'           => __( 'Todos los Items', 'pleisi' ),
        'add_new_item'        => __( 'Nuevo Item', 'pleisi' ),
        'add_new'             => __( 'Nuevo', 'pleisi' ),
        'new_item'            => __( 'Nuevo', 'pleisi' ),
        'edit_item'           => __( 'Editar', 'pleisi' ),
        'update_item'         => __( 'Actualizar', 'pleisi' ),
        'view_item'           => __( 'Ver', 'pleisi' ),
        'search_items'        => __( 'Buscar', 'pleisi' ),
        'not_found'           => __( 'Sin Resultados', 'pleisi' ),
        'not_found_in_trash'  => __( 'Sin Resultados en la Papelera', 'pleisi' ),
    );

    $args1 = array(
        'label'               => __( 'banner', 'pleisi' ),
        'description'         => __( 'Banner', 'pleisi' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-align-center',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,      
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'banner', $args1 );
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_banner', 0 );

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_banner::::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/



/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_cursoa::::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

function custom_post_type_cursos() {

    $labels = array(
        'name'                => _x( 'Cursos', 'Post Type General Name', 'pleisi' ),
        'singular_name'       => _x( 'Cursos', 'Post Type Singular Name', 'pleisi' ),
        'menu_name'           => __( 'Cursos', 'pleisi' ),
        'name_admin_bar'      => __( 'Post Type', 'pleisi' ),
        'parent_item_colon'   => __( 'Item Superior:', 'pleisi' ),
        'all_items'           => __( 'Todos los Items', 'pleisi' ),
        'add_new_item'        => __( 'Nuevo Item', 'pleisi' ),
        'add_new'             => __( 'Nuevo', 'pleisi' ),
        'new_item'            => __( 'Nuevo', 'pleisi' ),
        'edit_item'           => __( 'Editar', 'pleisi' ),
        'update_item'         => __( 'Actualizar', 'pleisi' ),
        'view_item'           => __( 'Ver', 'pleisi' ),
        'search_items'        => __( 'Buscar', 'pleisi' ),
        'not_found'           => __( 'Sin Resultados', 'pleisi' ),
        'not_found_in_trash'  => __( 'Sin Resultados en la Papelera', 'pleisi' ),
    );

    $args5 = array(
        'label'               => __( 'cursos', 'pleisi' ),
        'description'         => __( 'cursos', 'pleisi' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-art',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,      
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'cursos', $args5);
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_cursos', 0 );

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_cursos::::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_alumnas:::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

function custom_post_type_alumnas() {

    $labels = array(
        'name'                => _x( 'Alumnas', 'Post Type General Name', 'pleisi' ),
        'singular_name'       => _x( 'Alumnas', 'Post Type Singular Name', 'pleisi' ),
        'menu_name'           => __( 'Alumnas', 'pleisi' ),
        'name_admin_bar'      => __( 'Post Type', 'pleisi' ),
        'parent_item_colon'   => __( 'Item Superior:', 'pleisi' ),
        'all_items'           => __( 'Todos los Items', 'pleisi' ),
        'add_new_item'        => __( 'Nuevo Item', 'pleisi' ),
        'add_new'             => __( 'Nuevo', 'pleisi' ),
        'new_item'            => __( 'Nuevo', 'pleisi' ),
        'edit_item'           => __( 'Editar', 'pleisi' ),
        'update_item'         => __( 'Actualizar', 'pleisi' ),
        'view_item'           => __( 'Ver', 'pleisi' ),
        'search_items'        => __( 'Buscar', 'pleisi' ),
        'not_found'           => __( 'Sin Resultados', 'pleisi' ),
        'not_found_in_trash'  => __( 'Sin Resultados en la Papelera', 'pleisi' ),
    );

    $args6 = array(
        'label'               => __( 'alumnas', 'pleisi' ),
        'description'         => __( 'alumnas', 'pleisi' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,      
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'alumnas', $args6);
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_alumnas', 0 );

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::Inicio custom_post_type_alumnas:::::::::::::*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/


if (function_exists('add_image_size')) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('imgcurso', 300, 200, true);
}

function get_id_by_slug($page_slug) { 
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

