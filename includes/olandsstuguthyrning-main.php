<?php
/**
* Main class.
*
*/

class Olandsstuguthyrning_Rest_Api {

    /**
     * Returns the instance.
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Constructor method.
     */
    private function __construct() {
        $this->includes();
    }

    // Includes
    public function includes() {
        include_once OLANDSSTUGUTHYRNING_PLUGIN_DIR . '/includes/POST-functions.php';
    }
}