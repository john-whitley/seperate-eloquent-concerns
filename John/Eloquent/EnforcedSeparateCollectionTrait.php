<?php

namespace John\Eloquent;

trait EnforcedSeparateCollectionTrait
{

    protected function getCustomCollectionClass()
    {
        static $customClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customClass) {
            $collectionPath        = $this->getCollectionPathName();
            $customClass = $this->getCustomClass($collectionPath);
        }

        if (is_null($customClass)) {
            throw new \John\Eloquent\Exception\MissingCollectionException($this);
        }

        if (is_subclass_of($customClass, \Illuminate\Database\Eloquent\Collection::class)) {
            return $customClass;
        }

        throw new \John\Eloquent\Exception\CollectionNotCollectionException($customClass);
    }
}
