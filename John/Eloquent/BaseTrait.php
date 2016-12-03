<?php

namespace John\Eloquent;

trait BaseTrait
{
    static protected $eloquentRootPathName;
    static protected $eloquentSpecificName;

    protected function getModelPathName()
    {
        return 'Model';
    }

    protected function determinePathNames()
    {
        if (is_null($this->eloquentRootPathName) || is_null($this->eloquentSpecificName)) {
            $modelPathName     = $this->getModelPathName();
            $matchForNamespace = "/^(.+)\\\\${modelPathName}\\\\(.+)/";
            $className         = get_class($this);

            $matches = [];

            if (preg_match($matchForNamespace, $className, $matches)) {
                $this->eloquentRootPathName = $matches[1];
                $this->eloquentSpecificName = $matches[2];

                return;
            }

            throw new \John\Eloquent\Exception\UnknownModelNamespaceException($className, $modelPathName);
        }
    }

    protected function getRootPathName()
    {
        $this->determinePathNames();

        return $this->eloquentRootPathName;
    }

    protected function getSpecificName()
    {
        $this->determinePathNames();

        return $this->eloquentSpecificName;
    }

    protected function getCustomClass($entityPath)
    {
        $rootPath     = $this->getRootPathName();
        $specificPath = $this->getSpecificName();

        $customBuilderClass = "$rootPath\\$entityPath\\$specificPath";

        if (class_exists($customBuilderClass, true)) {
            return $customBuilderClass;
        }

        return null;
    }





    protected function getBuilderPathName()
    {
        return 'Builder';
    }

    abstract protected function getCustomBuilderClass();

    public function newEloquentBuilder($query)
    {
        $builderClass = $this->getCustomBuilderClass();

        if (is_null($builderClass)) {
            return parent::newEloquentBuilder($query);
        }

        return new $builderClass($query);
    }

    protected function getCollectionPathName()
    {
        return 'Collection';
    }

    abstract protected function getCustomCollectionClass();

    public function newCollection(array $models = [])
    {
        $builderClass = $this->getCustomCollectionClass();

        if (is_null($builderClass)) {
            return parent::newCollection($models);
        }

        return new $builderClass($models);
    }
}
