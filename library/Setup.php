<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
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
            
        } // __construct ()
        
        
        
        
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