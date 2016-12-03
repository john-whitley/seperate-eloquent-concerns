<?php

namespace John\Eloquent;

trait OptionalSeparateCollectionTrait
{

    protected function getCustomCollectionClass()
    {
        static $customClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customClass) {
            $builderPath = $this->getCollectionPathName();
            $customClass = $this->getCustomClass($builderPath);
        }

        if (is_null($customClass)) {
            return null;
        }

        if (is_subclass_of($customClass, \Illuminate\Database\Eloquent\Collection::class)) {
            return $customClass;
        }

        throw new \John\Eloquent\Exception\CollectionNotCollectionException($customClass);
    }
}
