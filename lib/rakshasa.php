<?php

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Rakshasa Theme' );
define( 'CHILD_THEME_URL', 'https://github.com/thremes/rakshasa' );

//* Load main functionality
add_action( 'genesis_setup', array( 'Rakshasa_Main', 'get_instance' ) );

//* Load cleanup functionality
require_once( 'rakshasa.cleanup.php' );
add_action( 'genesis_setup', array( 'Rakshasa_Cleanup', 'get_instance' ), 15 );

//* Load later functionality
require_once( 'rakshasa.later.php' );
add_action( 'genesis_setup', array( 'Rakshasa_Later', 'get_instance' ), 15 );

//* Load assets functionality
require_once( 'assets/assets.php' );
add_action( 'genesis_setup', array( 'Rakshasa_Assets', 'get_instance' ) );

/**
 * Class Rakshasa_Main
 */
final class Rakshasa_Main
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        //* Add HTML5 markup structure
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );

        //* Add viewport meta tag for mobile browsers
        add_theme_support( 'genesis-responsive-viewport' );
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Rakshasa_Main();
        }

        return $instance;
    }

}
