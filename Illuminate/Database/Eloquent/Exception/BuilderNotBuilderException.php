<?php

namespace Illuminate\Database\Eloquent\Exception;

/**
 * The class given as an \Illuminate\Database\Eloquent\Builder did not
 * extend \Illuminate\Database\Eloquent\Builder.
 */
class BuilderNotBuilderException extends \Exception
{
    /**
     * Make the exception contructor explanation more convenient to
     * instantiate.
     *
     * @param string $className the name of the class that should have
     *        been a builder.
     */
    public function __construct($className)
    {
        $message = "The class $className is not a child of Illuminate\Database\Eloquent\Builder.";

        parent::__construct($message);
    }
}
