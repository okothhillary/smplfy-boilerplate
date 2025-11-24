<?php

namespace SMPLFY\boilerplate\handlers;

class ScrollButtonHandler
{
    public function __construct()
    {
        // Enqueue JS/CSS for public pages
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    public function enqueueAssets(): void
    {
        // Correct plugin URL
        $plugin_url = plugin_dir_url(__DIR__ . '/../../') . 'public/';

        // Enqueue JS
        wp_enqueue_script(
            'scroll-bottom-js',
            $plugin_url . 'js/scroll-button.js',
            [],
            '1.0',
            true
        );

        // Enqueue CSS
        wp_enqueue_style(
            'scroll-bottom-css',
            $plugin_url . 'css/scroll-button.css',
            [],
            '1.0'
        );
    }
}
