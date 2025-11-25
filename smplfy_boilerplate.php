<?php
/**
 * Plugin Name: SMPLFY Boiler Plate
 * Version: 1.0.0
 * Description: Starter plugin with custom plugin framework to get started
 * Author: Thomas Picolo-Donnelly
 * Author URI: https://simplifybiz.com/
 * Requires PHP: 7.4
 * Requires Plugins: smplfy-core
 */

namespace SMPLFY\boilerplate;

prevent_external_script_execution();

// --- Constants ---
define('SITE_URL', get_site_url());
define('SMPLFY_NAME_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SMPLFY_NAME_PLUGIN_DIR', plugin_dir_path(__FILE__));

// TEMP: Check what it resolves to
var_dump(SMPLFY_NAME_PLUGIN_URL);

// --- Load utilities, bootstrap, handlers, enqueue ---
require_once SMPLFY_NAME_PLUGIN_DIR . 'admin/utilities/smplfy_require_utilities.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'includes/smplfy_bootstrap.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'includes/handlers/ScrollButtonHandler.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'includes/enqueue_scripts.php';

// --- Initialize plugin ---
bootstrap_boilerplate_plugin();

// --- Initialize scroll button handler ---
if (class_exists('SMPLFY\boilerplate\Handlers\ScrollButtonHandler')) {
    new Handlers\ScrollButtonHandler();
}

/**
 * Prevent direct access to plugin files
 */
function prevent_external_script_execution(): void
{
    if (!function_exists('get_option')) {
        header('HTTP/1.0 403 Forbidden');
        exit;
    }
}
