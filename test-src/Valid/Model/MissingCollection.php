<?php

namespace Illuminate\Database\Eloquent\Test\Valid\Model;

class MissingCollection extends \Illuminate\Database\Eloquent\Model {
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait, \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait;

}
