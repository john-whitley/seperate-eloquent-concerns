<?php

namespace John\Eloquent\Exception;

class MissingBuilderException extends \Exception
{

    public function __construct($modelInstance)
    {
        $className = get_class($modelInstance);

        $errorMessage = "The builder for model $className is not loadable.";
        $helpMessage  = "Does it have the correct namespace, or is it missing?";
        $message      = "$errorMessage  $helpMessage";

        parent::__construct($message);
    }
}
