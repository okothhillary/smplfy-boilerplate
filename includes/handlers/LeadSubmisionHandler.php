<?php

namespace SmplfyBoilerplate\Handlers;

use SmplfyBoilerplate\Entities\LeadEntity;

class LeadSubmissionHandler
{
    public function __construct()
    {
        // Run on Gravity Forms submission for form ID 3
        add_action('gform_after_submission_3', [$this, 'handleSubmission'], 10, 2);
    }

    public function handleSubmission($entry, $form): void
    {
        // Wrap Gravity Forms entry in your Entity
        $lead = new LeadEntity($entry);

        $first = $lead->firstName;
        $last = $lead->lastName;
        $email = $lead->email;
        $phone = $lead->phone;
        $city = $lead->city;

        error_log("New Lead: $first $last - $email - $phone - $city");
    }
}
