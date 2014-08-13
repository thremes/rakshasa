<?php

/**
 * Class Rakshasa_Later
 */
final class Rakshasa_Later
{
    /**
     * The Constructor
     */
    function __construct()
    {
        // TODO - Here goes any later functionality of yours...
    }

    /**
     * Get the Singleton instance
     */
    function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Rakshasa_Later();
        }

        return $instance;
    }
}
