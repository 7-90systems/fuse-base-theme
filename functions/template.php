<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @filter fuse_base_cols_per_sidebar
     *  @filter fuse_base_copyright_text_date_format
     */
    
    define ('FUSE_BASE_DEFAULT_SIDEBAR_COLS', 3);
    
    /**
     *  Set the classes for the #primary element.
     *
     *  @return string The class names
     */
    if (function_exists ('fuse_base_get_primary_classes') === false) {
        function fuse_base_get_primary_classes () {
            $columns = 12;
            $cols_per_sidebar = apply_filters ('fuse_base_cols_per_sidebar', FUSE_BASE_DEFAULT_SIDEBAR_COLS);
            
            $sidebar_count = \Fuse\Fuse::getInstance ()->layout->getSidebarCount ();
            
            $columns = $columns - ($sidebar_count * $cols_per_sidebar);
            
            return 'fuse-grid-cell fuse-grid-cell-l-'.$columns;
        } // fuse_base_get_primary_classes ()
    } // if ()
    
    /**
     *  Set the classes for the .secondary elements.
     *
     *  @return string The class names
     */
    if (function_exists ('fuse_base_get_secondary_classes') === false) {
        function fuse_base_get_secondary_classes () {
            return 'fuse-grid-cell fuse-grid-cell-l-'.apply_filters ('fuse_base_cols_per_sidebar', FUSE_BASE_DEFAULT_SIDEBAR_COLS);
        } // fuse_base_get_secondary_classes ()
    } // if ()
    
    // Add the filter
    add_filter ('fuse_sidebar_classes', 'fuse_set_secondary_classes');
    
    function fuse_set_secondary_classes ($classes) {
        $classes [] = fuse_base_get_secondary_classes ();
        
        return $classes;
    } // fuse_set_secondary_classes ()
    
    
    
    
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
                '<a href="'.esc_url (home_url ('/')).'">'.get_bloginfo ('name').'</a>'
            ), $text);
        } // fuse_base_set_footer_text_vars ()
    } // if ()