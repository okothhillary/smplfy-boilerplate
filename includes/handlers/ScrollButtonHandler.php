<?php

namespace SmplfyBoilerplate\Handlers;

class ScrollButtonHandler
{
    public function __construct()
    {
        // Enqueue JS/CSS for public pages
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    public function enqueueAssets(): void
    {
        $plugin_dir  = plugin_dir_path(dirname(__DIR__)) . 'public/';
        $plugin_url  = plugin_dir_url(dirname(__DIR__)) . 'public/';

        // Enqueue JS with version based on file modification time
        $js_file = $plugin_dir . 'js/scroll-button.js';
        wp_enqueue_script(
            'scroll-bottom-js',
            $plugin_url . 'js/scroll-button.js',
            [],
            file_exists($js_file) ? filemtime($js_file) : '1.0',
            true
        );

        // Enqueue CSS with version based on file modification time
        $css_file = $plugin_dir . 'css/scroll-button.css';
        wp_enqueue_style(
            'scroll-bottom-css',
            $plugin_url . 'css/scroll-button.css',
            [],
            file_exists($css_file) ? filemtime($css_file) : '1.0'
        );
    }
}
