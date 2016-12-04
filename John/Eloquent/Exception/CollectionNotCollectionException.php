<?php

namespace John\Eloquent\Exception;

class CollectionNotCollectionException extends \Exception
{
    /**
     * Make the exception contructor explanation more convenient to
     * instantiate.
     *
     * @param string $className the name of the class that should have
     *        been a collection.
     */
    public function __construct($className)
    {
        $message = "The class $className is not a child of Illuminate\Database\Eloquent\Collection.";

        parent::__construct($message);
    }
}
