<?php
    /**
     *  @package fuse-basse-theme
     *
     *  @version 1.0.0
     */
    
    namespace Fuse\Theme\Base;
    
    
    define ('FUSE_THEME_BASE_BASE_URI', __DIR__);
    define ('FUSE_THEME_BASE_BASE_URL', get_template_directory_uri ());
    
    
    $fuse_theme_base_setup = Setup::getInstance ();