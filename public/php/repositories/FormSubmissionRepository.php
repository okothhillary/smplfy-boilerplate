<?php
namespace SMPLFY\boilerplate\repositories; // lowercase

use SMPLFY\boilerplate\entities\FormSubmission;

class FormSubmissionRepository {
    public function log_submission(FormSubmission $submission) {
        error_log('[SMPLFY] Repository logging submission: Form ID: ' . $submission->formId);
    }
}
