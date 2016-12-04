<?php

namespace Illuminate\Database\Eloquent\Test\Valid\Model;

class EmailType extends \Illuminate\Database\Eloquent\Model {
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait, \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait;

  public function userEmails() {
    return $this->hasMany('Illuminate\Database\Eloquent\Test\Valid\Model\EmailType', 'email_types_id', 'email_types_id');
  }

}
