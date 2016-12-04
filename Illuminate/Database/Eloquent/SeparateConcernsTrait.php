<?php

namespace Illuminate\Database\Eloquent;

trait SeparateConcernsTrait
{
    static protected $eloquentRootPathName;
    static protected $eloquentSpecificName;

    /**
     * Get the token within the namespace that indicates that this is
     * a model.
     *
     * @return string the model directory name.  This defaults to 'Model'.
     */
    protected function getModelPathName()
    {
        return 'Model';
    }

    /**
     * Get the token within the namespace that indicates that this is
     * a builder.
     *
     * @return string the builder directory name.  This defaults to
     *         'Builder'.
     */
    protected function getBuilderPathName()
    {
        return 'Builder';
    }

    /**
     * Get the token within the namespace that indicates that this is
     * a collection.
     *
     * @return string the collection directory name.  This defaults to
     *         'Collection'.
     */
    protected function getCollectionPathName()
    {
        return 'Collection';
    }

    /**
     * This finds the prefix and suffix to the model directory to allow
     * this trait to determine the name of the builder and collection.
     * It is intended that this function is only called by this trait;
     * the result of this method would be seen by getRootPathName()
     * and getSpecificName().
     *
     * @return void
     *
     * @throws \Illuminate\Database\Eloquent\Exception\UnknownModelNamespaceException
     *         the model was not in a namespace with a token (directory)
     *         as recieved from getModelPathName().
     */
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

            throw new \Illuminate\Database\Eloquent\Exception\UnknownModelNamespaceException(
                $className,
                $modelPathName
            );
        }
    }

    /**
     * Get the prefix namespace of the model, builder and collection.
     *
     * @return string the prefix of the namespace.
     */
    protected function getRootPathName()
    {
        $this->determinePathNames();

        return $this->eloquentRootPathName;
    }

    /**
     * Get the suffix namespace of the model, builder and collection.
     *
     * @return string the suffix of the namespace, which will include
     *         the class name and may include more directories.
     */
    protected function getSpecificName()
    {
        $this->determinePathNames();

        return $this->eloquentSpecificName;
    }

    /**
     * Get a classname and test if it is a valid class.
     *
     * @param string $entityPath the token that the class will be.  It is
     *        invisaged that this will be the result of one
     *        of getModelPathName(), getBuilderPathName(), or
     *        getCollectionPathName().
     *
     * @return string|null the string of the class name if it is a valid
     *         class, or null.
     */
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

    /**
     * Get the custom builder class name.
     *
     * @return string|null the name of the class to use as the builder,
     *         or null if there is no custom builder.
     *
     * @see \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait
     * @see \Illuminate\Database\Eloquent\OptionalSeparateBuilderTrait
     */
    abstract protected function getCustomBuilderClass();

    /**
     * Instantiate a new builder for the model.
     *
     * @param mixed $query the query to start the builder filter with.
     *        This is defined in the eloquent model class.
     *
     * @return \Illuminate\Database\Eloquent\Builder the new eloquent
     *         builder.
     *
     * @see \Illuminate\Database\Eloquent\Model::newEloquentBuilder
     */
    public function newEloquentBuilder($query)
    {
        $builderClass = $this->getCustomBuilderClass();

        if (is_null($builderClass)) {
            return parent::newEloquentBuilder($query);
        }

        return new $builderClass($query);
    }

    /**
     * Get the custom collection class name.
     *
     * @return string|null the name of the class to use as the collection,
     *         or null if there is no custom collection.
     *
     * @see \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait
     * @see \Illuminate\Database\Eloquent\OptionalSeparateCollectionTrait
     */
    abstract protected function getCustomCollectionClass();

    /**
     * Instantiate a new collection for the model.
     *
     * @param array $models the list of models to be in the collection.
     *        This is defined in the eloquent model class.
     *
     * @return \Illuminate\Database\Eloquent\Collection the new eloquent
     *         collection.
     *
     * @see \Illuminate\Database\Eloquent\Model::newCollection
     */
    public function newCollection(array $models = [])
    {
        $builderClass = $this->getCustomCollectionClass();

        if (is_null($builderClass)) {
            return parent::newCollection($models);
        }

        return new $builderClass($models);
    }
}
