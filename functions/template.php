<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @fitler fuse_base_copyright_text_date_format
     */
    
    /**
     *  Set the classes for the #primary element.
     *
     *  @return string The class names
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
    
    
    
    
    /**
     *  Set the variables for the footer copyright bar text.
     *
     *  Available substitutions are:
     *      %%YEAR%% - The current year
     *      %%DATE%% - The current date
     *      %%NAME%% - The site name
     *
     *  @param string $text The text to format.
     *
     *  @return string The formatted text with variables swapped.
     */
    if (function_exists ('fuse_base_set_footer_text_vars') === false) {
        function fuse_base_set_footer_text_vars ($text) {
            $date_format = apply_filters ('fuse_base_copyright_text_date_format', 'j/n/Y');
            
            return str_replace (array (
                '%%YEAR%%',
                '%%DATE%%',
                '%%NAME%%'
            ), array (
                current_time ('Y'),
                current_time ($date_format),
                get_bloginfo ('name')
            ), $text);
        } // fuse_base_set_footer_text_vars ()
    } // if ()