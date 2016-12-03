<?php

namespace John\Eloquent;

trait EnforcedSeparateBuilderTrait
{

    protected function getCustomBuilderClass()
    {
        static $customBuilderClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customBuilderClass) {
            $builderPath        = $this->getBuilderPathName();
            $customBuilderClass = $this->getCustomClass($builderPath);
        }

        if (is_null($customBuilderClass)) {
            throw new \John\Eloquent\Exception\MissingBuilderException($this);
        }

        if (is_subclass_of($customBuilderClass, \Illuminate\Database\Eloquent\Builder::class)) {
            return $customBuilderClass;
        }

        throw new \John\Eloquent\Exception\BuilderNotBuilderException($customBuilderClass);
    }
}
