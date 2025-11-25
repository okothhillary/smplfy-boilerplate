<?php
namespace SMPLFY\boilerplate\Handlers;

class ScrollButtonHandler
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    public function enqueueAssets(): void
    {
        // Base plugin URL
        $plugin_url = SMPLFY_NAME_PLUGIN_URL;

        // Scroll button JS
        wp_enqueue_script(
            'smplfy-scroll-button',
            $plugin_url . 'public/js/scroll-button.js',
            ['jquery'],
            '1.0',
            true
        );

        // Scroll button CSS
        wp_enqueue_style(
            'smplfy-scroll-button-style',
            $plugin_url . 'public/css/scroll-button.css',
            [],
            '1.0'
        );
    }
}
