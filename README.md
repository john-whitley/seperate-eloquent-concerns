# johnwhitley/separateeloquentconcerns
> Automate Eloquent models to have a defined separate builder and collection per model.

Eloquent allows both set and individual entity methods to be defined
on the model class: this is good for small projects and good to get
started using Eloquent.

There are times when a model grows to an extent where separating the set
(scope prefixed) function from the individual's functions (relationships,
accessors, mutators, etc.) help the model stay a more manageable size.
There are a number of possible solutions that would solve this; this
project advocates putting what would normally be a "scope" prefixed
function into a custom builder class - one custom builder per model.

This project assumes a strict namespace for models, collections and
builders, so that where the model is in a directory "Model", the
collection is in a sibling directory "Collection", and the eloquent
builder in another directory "Builder".

## Installing

```shell
composer require johnwhitley/separateeloquentconcerns
```

## Using
There are two options when using this model extention: to enforce the
existance of the custom builder or collection; or to gracefully fall
back to the default builder or collection.

To force the existance of a custom builder and a custom collection,
add these traits to your model:
```php
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait, \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait;
```

To allow the existance of a custom builder and a custom collection, but
fall back to the default builder or collection should they be absent;
add these traits to your model:
```php
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\OptionalSeparateBuilderTrait, \Illuminate\Database\Eloquent\OptionalSeparateCollectionTrait;
```

You may choose to use optional collection and enforced builder; or
vise versa.
