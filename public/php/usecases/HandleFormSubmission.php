<?php
namespace SMPLFY\boilerplate\usecases; // lowercase

use SMPLFY\boilerplate\entities\FormSubmission;
use SMPLFY\boilerplate\repositories\FormSubmissionRepository;

class HandleFormSubmission {
    private FormSubmissionRepository $repository;

    public function __construct() {
        $this->repository = new FormSubmissionRepository();
    }

    public function process($entry, $form) {
        $entity = new FormSubmission($entry);
        $this->repository->log_submission($entity);
    }
}
