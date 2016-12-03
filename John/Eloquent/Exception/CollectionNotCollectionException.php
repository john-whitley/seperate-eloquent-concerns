<?php

namespace John\Eloquent\Exception;

class CollectionNotCollectionException extends \Exception
{

    public function __construct($className)
    {
        $message = "The class $className is not a child of Illuminate\Database\Eloquent\Collection.";

        parent::__construct($message);
    }
}
