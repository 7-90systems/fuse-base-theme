<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @filter fuse_base_settings_form_panels
     */
    
    namespace Fuse\Theme\Base\Admin;
    
    use Fuse\Forms\Component;
    
    
    class Settings {
        
        /**
         *  Object constructor...
         */
        public function __construct () {
            add_filter ('fuse_settings_form_panels', array ($this, 'settingsPanels'));
        } // __construct ()
        
        
        
        
        /**
         *  Add our settings panels to the main form.
         *
         *  @param array $panels The starting list of panels.
         *
         *  @return array The completed array of panels.
         */
        public function settingsPanels ($panels) {
            $new_panels = apply_filters ('fuse_base_settings_form_panels', array (
                new Component\Panel ('base_header', __ ('Header', 'fuse'), array (
                    new Component\Field\Select (
                        'fuse_base_header_menu_location',
                        __ ('Main menu location', 'fuse'),
                        array (
                            'under_header' => __ ('Under header', 'fuse'),
                            'in_header' => __ ('In header', 'fuse'),
                            'none' => __ ('No menu', 'fuse')
                        ),
                        get_fuse_option ('fuse_base_header_menu_location', 'under_header')
                    ),
                    new Component\Field\Select (
                        'fuse_base_header_user_bar_location',
                        __ ('User bar location', 'fuse'),
                        array (
                            'over_header' => __ ('Over header', 'fuse'),
                            'under_header' => __ ('Under header', 'fuse'),
                            'in_header' => __ ('In header', 'fuse'),
                            'none' => __ ('No menu', 'fuse')
                        ),
                        get_fuse_option ('fuse_base_header_user_bar_location', 'none')
                    )
                )),
                new Component\Panel ('base_footer', __ ('Footer', 'fuse'), array (
                    new Component\Field\Toggle (
                        'fuse_base_footer_show_footer',
                        __ ('Show footer', 'fuse'),
                        get_fuse_option ('fuse_base_footer_show_footer', 'yes')
                    ),
                    new Component\Field\Toggle (
                        'fuse_base_footer_show_copyright',
                        __ ('Show copyright bar', 'fuse'),
                        get_fuse_option ('fuse_base_footer_show_copyright', 'yes')
                    ),
                    new Component\Field\Text (
                        'fuse_base_footer_copyright_text',
                        __ ('Copyright text', 'fuse'),
                        get_fuse_option ('fuse_base_footer_copyright_text', ''),
                        array (
                            'placeholder' => __ ('Leave blank for default text', 'fuse'),
                            'conditions' => array (
                                array (
                                    'field_id' => 'fuse_base_footer_show_copyright',
                                    'value' => 'yes'
                                )
                            )
                        )
                    ),
                    new Component\Field\Text (
                        'fuse_base_footer_credits_text',
                        __ ('Credits text', 'fuse'),
                        get_fuse_option ('fuse_base_footer_credits_text', ''),
                        array (
                            'placeholder' => __ ('Leave blank for default text', 'fuse'),
                            'conditions' => array (
                                array (
                                    'field_id' => 'fuse_base_footer_show_copyright',
                                    'value' => 'yes'
                                )
                            )
                        )
                    )
                ))
            ));
            
            return array_merge ($panels, $new_panels);
        } // settingsPanels ()
        
    } // Settings