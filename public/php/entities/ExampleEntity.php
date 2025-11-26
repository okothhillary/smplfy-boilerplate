<?php

namespace SMPLFY\boilerplate;

use SmplfyCore\SMPLFY_BaseEntity;

class ExampleEntity extends SMPLFY_BaseEntity {

    public function __construct( $formEntry = [] ) {
        parent::__construct( $formEntry );
        $this->formId = FormIds::CONTACT_FORM_ID;
    }

    protected function get_property_map(): array {
        return [

            // Business name (GF ID 1)
            'business_name' => '1',

            // Address (GF ID 4)
            'address' => '4',

            // Preferred contact (GF ID 11)
            'preferred_contact' => '11',

            // Email (GF ID 2)
            'email' => '2',

            // Phone (GF ID 5)
            'phone' => '5',

        ];
    }
}
