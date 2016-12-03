<?php

namespace John\Eloquent\Test\Valid\Model;

class InvalidCollection extends \Illuminate\Database\Eloquent\Model {
  use \John\Eloquent\BaseTrait, \John\Eloquent\EnforcedSeparateBuilderTrait, \John\Eloquent\EnforcedSeparateCollectionTrait;

}

