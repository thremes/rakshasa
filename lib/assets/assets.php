<?php

/**
 * Class Rakshasa_Assets
 */
final class Rakshasa_Assets
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        $this->style_trump();

        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Rakshasa_Assets();
        }

        return $instance;
    }

    /**
     * Style Trump
     */
    function style_trump()
    {
        remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
        add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );
    }

    /**
     * Enqueue fonts
     */
    function fonts()
    {
        $open_sans   = 'Open+Sans:300,400,600,700';
        $droid_serif = 'Droid+Serif:400,700,400italic,700italic';
        $this->enqueue_style( 'rakshasa-fonts', "//fonts.googleapis.com/css?family={$open_sans}|{$droid_serif}" );
    }

    /**
     * Enqueue Styles
     */
    function styles()
    {
        $this->enqueue_style( 'rakshasa-normalize', 'normalize.css' );
        $this->enqueue_style( 'rakshasa-base', 'base.css', array( 'rakshasa-normalize' ) );
    }

    /**
     * Enqueue Style
     *
     * @param        $handle
     * @param        $src
     * @param array  $deps
     * @param string $media
     */
    private function enqueue_style( $handle, $src, $deps = array(), $media = 'all' )
    {
        $src = trailingslashit( get_stylesheet_directory_uri() ) . "lib/assets/css/{$src}";
        wp_enqueue_style( $handle, $src, $deps, FALSE, $media );
    }
}
