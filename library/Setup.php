<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @filter fuse_base_sidebar_single_cols
     *  @filter fuse_base_sidebar_multi_cols
     *  @filter fuse_base_footer_columns
     *
     *  Lets set up our theme!
     */
    
    namespace Fuse\Theme\Base;
    
    
    class Setup {
        
        /**
         *  @var Fuse\Theme\Base\Setup This is the singular instance of this object.
         */
        private static $_instance;
        
        
        
        
        /**
         *  Object constructor.
         */
        private function __construct () {
            // Set up our sidebar classes
            add_filter ('fuse_sidebar_classes', array ($this, 'setSidebarClasses'), 10, 4);
            
            // Add our function files
            add_filter ('fuse_load_functions_from', array ($this, 'addFunctionFileDirectory'));
            
            // Add theme supports
            add_filter ('fuse_theme_supports', array ($this, 'themeSupports'));
            
            // Get our themes features set up
            add_filter ('fuse_sidebars', array ($this, 'addSidebars'));
            
            // Set up our CSS style rules in the page header.
            add_action ('wp_header', array ($this, 'addCustomCss'), 20);
            
            // Set up our admin functionality
            if (is_admin ()) {
                $admin_settings = new Admin\Settings ();
            } // if ()
        } // __construct ()
        
        
        
        
        /**
         *  Add our sidebar classes.
         *
         *  @param array $classes The classes set for the sidebar.
         *  @param int $column_number The column number, either be 1 or 2.
         *  #param string $location The column location, either 'left' or 'right'.
         *  #parm Fuse\Layout $layout The layout object.
         *
         *  @return array Return the sidebar classes.
         */
        public function setSidebarClasses ($classes, $column_number, $location, $layout) {
            $sidebar_single_cols = apply_filters ('fuse_base_sidebar_single_cols', 3);
            $sidebar_multi_cols = apply_filters ('fuse_base_sidebar_multi_cols', 2);
            
            $classes [] = 'fuse-grid-col';
            
            $sidebar_count = $layout->getSidebarCount ();
            
            if ($sidebar_count == 1) {
                $classes [] = 'col-'.$sidebar_single_cols;
            } // if ()
            elseif ($sidebar_count > 1) {
                $classes [] = 'col-'.$sidebar_multi_cols;
            } // elseif ()
            
            return $classes;
        } // setSidebarClasses ()
        
        /**
         *  Add our function file directory location.
         *
         *  @param array $dirs The directories
         *
         *  @return array The full directory list.
         */
        public function addFunctionFileDirectory ($dirs) {
            $dirs [] = FUSE_THEME_BASE_BASE_URI.DIRECTORY_SEPARATOR.'functions';
            
            return $dirs;
        } // addFunctionFileDirectory ()
        
        /**
         *  Add our theme supports statements.
         *
         *  @param array $supports The initial supports list.
         *
         *  @return array The completed supports list.
         */
        public function themeSupports ($supports) {
            $supports [] = 'custom-logo';
            $supports [] = 'post-thumbnails';
            $supports [] = 'woocommerce';
            
            return $supports;
        } // themeSupports ()
        
        /**
         *  Add our sidebars.
         *
         *  @param array $sidebars The starting set of sidebars.
         *
         *  @return array The completed sidebar list.
         */
        public function addSidebars ($sidebars) {
            // Footer columns
            for ($i = 0; $i < get_fuse_option ('fuse_base_footer_columns', 4); $i++) {
                $sidebars ['footer_column_'.$i] = sprintf (__ ('Footer Column %d', 'fuse'), $i + 1);
            } // for ()
            
            return $sidebars;
        } // addSidebars ()
        
        /**
         *  Add our custom CSS styles to the header area.
         */
        public function customCss () {
            ?>
                <style type="text/css" media="all">
                    
                </style>
            <?php
        } // customCss ()
        
        
        
        
        
        /**
         *  Get the singular object instance.
         *
         *  @return Fuse\Theme\Base\Setup This singular object instance.
         */
        static public function getInstance () {
            if (is_null (self::$_instance)) {
                self::$_instance = new Setup ();
            } // if ()
            
            return self::$_instance;
        } // getInstance ()
        
    } // class Setup