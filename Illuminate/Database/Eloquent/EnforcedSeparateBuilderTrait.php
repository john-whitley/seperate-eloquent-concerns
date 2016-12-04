<?php

namespace Illuminate\Database\Eloquent;

trait EnforcedSeparateBuilderTrait
{
    /**
     * Return the name of the eloquent builder class that the model
     * should use for it's builder.
     *
     * @return string the name of the class to use as the builder
     *
     * @throws \Illuminate\Database\Eloquent\Exception\MissingBuilderException there
     *         is no class with the correct name to be the custom builder.
     * @throws \Illuminate\Database\Eloquent\Exception\BuilderNotBuilderException
     *         there is a class with the correct name to be the
     *         custom eloquent builder, but it does not inherit from
     *         \Illuminate\Database\Eloquent\Builder.
     */
    protected function getCustomBuilderClass()
    {
        static $customBuilderClass = 'REPLACE_ME';

        if ('REPLACE_ME' === $customBuilderClass) {
            $builderPath        = $this->getBuilderPathName();
            $customBuilderClass = $this->getCustomClass($builderPath);
        }

        if (is_null($customBuilderClass)) {
            throw new \Illuminate\Database\Eloquent\Exception\MissingBuilderException($this);
        }

        if (is_subclass_of($customBuilderClass, \Illuminate\Database\Eloquent\Builder::class)) {
            return $customBuilderClass;
        }

        throw new \Illuminate\Database\Eloquent\Exception\BuilderNotBuilderException($customBuilderClass);
    }
}
