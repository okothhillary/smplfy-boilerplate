<?php
/**
 *  Loads specified files and all files in specified directories, initializes dependencies
 */

namespace SMPLFY\boilerplate;

function bootstrap_boilerplate_plugin() {
    require_boilerplate_dependencies();

    if ( class_exists( '\SMPLFY\boilerplate\DependencyFactory' ) ) {
        \SMPLFY\boilerplate\DependencyFactory::create_plugin_dependencies();
    }

    // Load and instantiate custom handlers
    $handlers_dir = __DIR__ . '/handlers';
    if ( is_dir( $handlers_dir ) ) {
        foreach ( glob( $handlers_dir . '/*.php' ) as $file ) {
            require_once $file;
        }
    }

    // Instantiate ScrollButtonHandler if it exists
    $scroll_handler_class = '\SmplfyBoilerplate\Handlers\ScrollButtonHandler';
    if ( class_exists( $scroll_handler_class ) ) {
        new $scroll_handler_class();
    }
}

/**
 * When adding a new directory to the custom plugin, remember to require it here
 *
 * @return void
 */
function require_boilerplate_dependencies() {
    require_file( 'includes/enqueue_scripts.php' );
    require_file( 'admin/DependencyFactory.php' );

    require_directory( 'public/php/types' );
    require_directory( 'public/php/entities' );
    require_directory( 'public/php/repositories' );
    require_directory( 'public/php/usecases' );
    require_directory( 'public/php/adapters' );
}
