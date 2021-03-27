<?php

function init_template(){
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');

  register_nav_menus(
    array(
      "top_menu" => "Main Menu"
    )
    );
}

add_action('after_setup_theme','init_template');

function assets(){
  wp_register_style("bootstrap","https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css", "","5.0","all");
  wp_register_style("lato","https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&display=swap", "","1.0","all");

  wp_enqueue_style("styles",get_stylesheet_uri(),array("bootstrap","lato"),"1.0","all");

  wp_enqueue_script("bootstrap","https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js","","5.0.0",true);
  wp_enqueue_script("custom",get_template_directory_uri()."/assets/js/custom.js","","1.0",true);
}

add_action("wp_enqueue_scripts","assets");

function sidebar(){
  register_sidebar(
    array(
      'name'=> 'Footer',
      'id'=>'footer',
      'description'=> 'footer widgets',
      'before_title'=> '<p>',
      'after_title'=> '</p>',
      'before_widget'=> '<div id="%1$s" class="%2$s">',
      'after_widget'=> '</div>',
    )
    );
}

add_action('widgets_init','sidebar');

function product_types(){
  $labels=array(
    "name"=>"Products",
    "singular_name"=>"Product",
    "menu_name"=>"Products",
  );
  $args=array(
    "label"=>"Products",
    "description"=>"Gifs",
    "labels"=> $labels,
    "supports"=>array("title","editor","thumbnail","revisions"),
    "public" => true,
    "show_in_menu"=>true,
    "menu_position"=>5,
    "menu_icon"=>"dashicons-cart",
    "can_export"=>true,
    "publicy_queryable"=>true,
    "rewrite"=>true,
    "show_in_rest"=>true,
  );
  register_post_type("product",$args);
}

add_action("init","product_types");