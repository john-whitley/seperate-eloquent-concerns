<?php

namespace John\Eloquent;

trait OptionalSeparateBuilderTrait
{
    /**
     * Return the name of the eloquent builder class that the model
     * should use for it's builder.
     *
     * @return string the name of the class to use as the builder
     *
     * @throws \John\Eloquent\Exception\BuilderNotBuilderException there
     *         is a class with the correct name to be the custom
     *         eloquent builder, but it does not inherit from
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
            return null;
        }

        if (is_subclass_of($customBuilderClass, \Illuminate\Database\Eloquent\Builder::class)) {
            return $customBuilderClass;
        }

        throw new \John\Eloquent\Exception\BuilderNotBuilderException($customBuilderClass);
    }
}
