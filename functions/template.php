<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     */
    
    /**
     *  Set the classes for the #primary element.
     *
     *  @return string Teh class names
     */
    if (function_exists ('fuse_base_get_primary_classes') === false) {
        function fuse_base_get_primary_classes () {
            $columns = 16;
            
            $sidebar_count = \Fuse\Fuse::getInstance ()->layout->getSidebarCount ();
            
            if ($sidebar_count == 1) {
                $columns = $columns - apply_filters ('fuse_base_sidebar_single_cols', 3);
            } // if ()
            elseif ($sidebar_count > 1) {
                $columns = $columns - (apply_filters ('fuse_base_sidebar_multi_cols', 2) * $sidebar_count);
            } // elseif ()
            
            return 'fuse-grid-col col-'.$columns;
        } // fuse_base_get_primary_classes ()
    } // if ()