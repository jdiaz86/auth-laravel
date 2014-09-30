<?php
/**
 * Created by IntelliJ IDEA.
 * User: jdiaz
 * Date: 24/08/14
 * Time: 07:17 PM
 */

namespace HireMe\Managers;


class ValidationException extends \Exception{

    protected $errors;

    public function __construct($message, $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);


    }

    public function getErrors()
    {
        return $this->errors;
    }
} 