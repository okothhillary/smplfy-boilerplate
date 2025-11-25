<?php
namespace SMPLFY\boilerplate;

function enqueue_boilerplate_frontend_scripts() {
    global $current_user, $post;
    $current_user = wp_get_current_user();

    // Heartbeat script
    wp_enqueue_script('heartbeat');
    wp_register_script(
        'smplfy-demo-heartbeat-script',
        SMPLFY_NAME_PLUGIN_URL . 'public/js/wp-heartbeat-example.js',
        ['jquery','heartbeat'],
        null,
        true
    );

    // Frontend JS & CSS
    wp_register_script(
        'smplfy-demo-frontend-script',
        SMPLFY_NAME_PLUGIN_URL . 'public/js/frontend.js',
        ['jquery'],
        null,
        true
    );

    wp_register_style(
        'smplfy-demo-frontend-styles',
        SMPLFY_NAME_PLUGIN_URL . 'public/css/frontend.css'
    );

    // Enqueue frontend scripts & styles
    wp_enqueue_script('smplfy-demo-frontend-script');
    wp_enqueue_style('smplfy-demo-frontend-styles');

    // Heartbeat script only on page ID 999
    if ($post->ID == 999) {
        wp_enqueue_script('smplfy-demo-heartbeat-script');
        wp_localize_script('smplfy-demo-heartbeat-script', 'heartbeat_object', [
            'user_id' => $current_user->ID,
            'page_id' => $post->ID
        ]);
    }
}

add_action('wp_enqueue_scripts', 'SMPLFY\boilerplate\enqueue_boilerplate_frontend_scripts');
