<?php

namespace John\Eloquent\Exception;

class UnknownModelNamespaceException extends \Exception
{

    public function __construct($className, $modelPathName)
    {
        $errorMessage = "Unknown namespace for model $className.";
        $helpMessage  = "It is expected to be in a namespace that contains /$modelPathName/.";
        $message      = "$errorMessage  $helpMessage";

        parent::__construct($message);
    }
}
