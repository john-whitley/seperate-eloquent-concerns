<?php

namespace Illuminate\Database\Eloquent\Exception;

class UnknownModelNamespaceException extends \Exception
{
    /**
     * Make the exception contructor explanation more convenient to
     * instantiate.
     *
     * @param string $className     the name of the model class
     * @param string $modelPathName the token that is expected to appear
     *        in the namespace of the model to allow the automation of
     *        the name discovery for the builder and the collection.
     */
    public function __construct($className, $modelPathName)
    {
        $errorMessage = "Unknown namespace for model $className.";
        $helpMessage  = "It is expected to be in a namespace that contains /$modelPathName/.";
        $message      = "$errorMessage  $helpMessage";

        parent::__construct($message);
    }
}
