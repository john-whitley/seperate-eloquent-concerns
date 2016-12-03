<?php

namespace John\Eloquent;

trait OptionalSeparateBuilderTrait
{

    protected function getCustomBuilderClass()
    {
        static $customBuilderClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customBuilderClass) {
            $builderPath        = $this->getBuilderPathName();
            $customBuilderClass = $this->getCustomClass($builderPath);
        }

        if (is_null($customBuilderClass)) {
            return null;
        }

        if (is_subclass_of($customBuilderClass, \Illuminate\Database\Eloquent\Builder::class)) {
            return $customBuilderClass;
        }

        throw new \John\Eloquent\Exception\BuilderNotBuilderException($customBuilderClass);
    }
}
