<?php
function load_theme_js_and_css() {
   // Include css
   wp_enqueue_style( 'd5-design-parent-style', get_template_directory_uri() .'/style.css' );
   wp_enqueue_style( 'd5-design-child-style', get_stylesheet_uri(), array('d5-design-parent-style'));
   
   // Include JS scripts
       wp_enqueue_script( 'd5-design-child-js', get_stylesheet_directory_uri() . '/js/load_distro_version.js', array('jquery'), false, true );
}

add_action( 'wp_enqueue_scripts', 'load_theme_js_and_css' );

