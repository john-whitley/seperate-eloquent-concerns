<?php

namespace Illuminate\Database\Eloquent;

trait EnforcedSeparateCollectionTrait
{
    /**
     * Return the name of the eloquent collection class that the model
     * should use for it's collection.
     *
     * @return string the name of the class to use as the collection
     *
     * @throws \Illuminate\Database\Eloquent\Exception\MissingCollectionException there
     *         is no class with the correct name to be the custom
     *         collection.
     * @throws \Illuminate\Database\Eloquent\Exception\CollectionNotCollectionException
     *         there is a class with the correct name to be the
     *         custom eloquent collection, but it does not inherit from
     *         \Illuminate\Database\Eloquent\Collection.
     */
    protected function getCustomCollectionClass()
    {
        static $customClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customClass) {
            $collectionPath = $this->getCollectionPathName();
            $customClass    = $this->getCustomClass($collectionPath);
        }

        if (is_null($customClass)) {
            throw new \Illuminate\Database\Eloquent\Exception\MissingCollectionException($this);
        }

        if (is_subclass_of($customClass, \Illuminate\Database\Eloquent\Collection::class)) {
            return $customClass;
        }

        throw new \Illuminate\Database\Eloquent\Exception\CollectionNotCollectionException($customClass);
    }
}
