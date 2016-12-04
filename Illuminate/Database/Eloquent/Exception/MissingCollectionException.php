<?php

namespace Illuminate\Database\Eloquent\Exception;

class MissingCollectionException extends \Exception
{
    /**
     * Make the exception contructor explanation more convenient to
     * instantiate.
     *
     * @param \Illuminate\Database\Eloquent\Model $modelInstance the
     *        model instance that a custom collection should have been
     *        available for.
     */
    public function __construct($modelInstance)
    {
        $className = get_class($modelInstance);

        $errorMessage = "The collection for model $className is not loadable.";
        $helpMessage  = "Does it have the correct namespace, or is it missing?";
        $message      = "$errorMessage  $helpMessage";

        parent::__construct($message);
    }
}
