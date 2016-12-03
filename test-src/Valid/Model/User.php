<?php

namespace John\Eloquent\Test\Valid\Model;

class User extends \Illuminate\Database\Eloquent\Model {
  use \John\Eloquent\BaseTrait, \John\Eloquent\EnforcedSeparateBuilderTrait, \John\Eloquent\EnforcedSeparateCollectionTrait;

  public function userEmails() {
    return $this->hasMany('John\Eloquent\Test\Valid\Model\UserEmail', 'users_id', 'users_id');
  }

}
