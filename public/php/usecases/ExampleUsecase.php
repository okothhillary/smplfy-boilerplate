<?php
/**
 * Task 1: Send Contact Form submission to Webhook.site
 *
 * This replaces the old my_custom_plugin_gravity_webhook() function
 * from your custom plugin, but now uses the Core Entity pattern.
 */

namespace SMPLFY\boilerplate;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ExampleUsecase {

    /**
     * Optional repository, not currently used in this Task 1 usecase.
     * Keeping the constructor signature means bootstrap code that
     * instantiates ExampleUsecase( new ExampleRepository() ) still works.
     */
    private ?ExampleRepository $exampleRepository;

    public function __construct( ExampleRepository $exampleRepository = null ) {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * This method is called by the GravityFormsAdapter when the form is submitted.
     *
     * @param array $entry The Gravity Forms entry array.
     */
    public function example_function( array $entry ): void {

        // Wrap the raw GF entry in our Core Entity
        $entity = new ExampleEntity( $entry );

        // Build the same payload you used in your original plugin
        $data = array(
            'business_name'     => rgar($entry, '1'),
            'address'           => rgar($entry, '4'),
            'preferred_contact' => rgar($entry, '11'),
            'email'             => rgar($entry, '2'),
            'phone'             => rgar($entry, '5'),

        );
        error_log('[SMPLFY DATA] ' . print_r($data, true));

        // Send the data to Webhook.site
        $response = wp_remote_post(
            'https://webhook.site/e9b82e9f-4992-4bb0-bd30-33d422e8f9c1',
            array(
                'method'    => 'POST',
                'headers'   => array('Content-Type' => 'application/json; charset=utf-8'),
                'body'      => wp_json_encode($data),
                'timeout'   => 15,
                'sslverify' => true,
            )
        );

        // Optional: log the response for debugging
        if ( is_wp_error($response) ) {
            error_log('[SMPLFY] Webhook request failed: ' . $response->get_error_message());
        } else {
            error_log('[SMPLFY] Webhook request succeeded: ' . wp_remote_retrieve_body($response));
        }
    }
}
