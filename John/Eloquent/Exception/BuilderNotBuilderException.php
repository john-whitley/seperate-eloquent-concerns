<?php

namespace John\Eloquent\Exception;

class BuilderNotBuilderException extends \Exception
{

    public function __construct($className)
    {
        $message = "The class $className is not a child of Illuminate\Database\Eloquent\Builder.";

        parent::__construct($message);
    }
}
