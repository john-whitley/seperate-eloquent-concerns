<?php

namespace Illuminate\Database\Eloquent\Test\Valid\Model;

class User extends \Illuminate\Database\Eloquent\Model {
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait, \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait;

  public function userEmails() {
    return $this->hasMany('Illuminate\Database\Eloquent\Test\Valid\Model\UserEmail', 'users_id', 'users_id');
  }

}
