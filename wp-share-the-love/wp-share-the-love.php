<?php
/*
Plugin Name: Sharing the Love
Plugin URI: http://romkey.com/sharing-the-love
Description: Decorate your site with drifting hearts, via https://github.com/romkey/SharingTheLove - Plugin source available at https://github.com/romkey/SharingTheLove
Version: 0.1
Author: John Romkey
Author URI: http://romkey.com
License: GPL2
*/
add_action( 'wp_enqueue_scripts', 'share_the_love_init' );
add_action( 'wp_footer', 'share_the_love_footer' );

function share_the_love_init() {
  $now = getdate();

  if( $now[ 'mday'] = 14 && $now[ 'mon' ] = 2 && stl_fool() ) {
    wp_enqueue_script( 'wp-share-the-love', plugins_url('/hearts.min.js', __FILE__ ) );
    wp_enqueue_style( 'wp-share-the-love',  plugins_url('/hearts.min.css', __FILE__ ) );
    }
}

function share_the_love_footer() {
    echo '<script>Hearts();</script>';
}

// from https://github.com/rfreebern/Do-Not-Fool
function stl_fool() {
  $r = getallheaders();
  return isset( $r[ 'DNF' ]) ? $r[ 'DNF' ] ? 0 : 1 : 1;
}
?>
