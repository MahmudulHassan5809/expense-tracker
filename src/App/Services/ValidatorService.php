<?php

declare(strict_types=1);


namespace App\Services;

use Framework\Rules\RequiredRule;
use Framework\Validator;

class ValidatorService {
    private Validator $validator;

    public function __construct() {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
    }

    public function validateRegister(array $formData) {
        $this->validator->validate($formData);
    }
}
