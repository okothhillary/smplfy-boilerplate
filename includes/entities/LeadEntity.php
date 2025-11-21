<?php

namespace SmplfyBoilerplate\Entities;

use SmplfyCore\SMPLFY_BaseEntity;

class LeadEntity extends SMPLFY_BaseEntity
{

    protected function get_property_map(): array
    {
        return [
            'firstName' => '1.3',  // map to GF field ID
            'lastName' => '1.6',
            'email' => '2',
            'phone' => '3',
            'city' => '4',
            // add more fields as needed
        ];
    }

}
