<?php

namespace John\Eloquent\Test\Valid\M;

class User extends \Illuminate\Database\Eloquent\Model {
  use \John\Eloquent\BaseTrait, \John\Eloquent\EnforcedSeparateBuilderTrait, \John\Eloquent\EnforcedSeparateCollectionTrait;

}
