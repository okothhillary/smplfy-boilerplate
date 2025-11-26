<?php
namespace SMPLFY\boilerplate\entities;

use SmplfyCore\SMPLFY_BaseEntity;
use SMPLFY\boilerplate\FormIds;

class FormSubmission extends SMPLFY_BaseEntity {
    public function __construct($formEntry = []) {
        parent::__construct($formEntry);
        $this->formId = FormIds::REGISTRATION_FORM_ID;
    }

    protected function get_property_map(): array {
        return [
            'nameFirst' => '1.3',
            'nameLast'  => '1.6',
            'email' => '3',
            'phone' => '4',
            'attendees' => '8',
            'event' => '17',
        ];
    }
}
