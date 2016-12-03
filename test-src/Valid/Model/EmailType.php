<?php

namespace John\Eloquent\Test\Valid\Model;

class EmailType extends \Illuminate\Database\Eloquent\Model {
  use \John\Eloquent\BaseTrait, \John\Eloquent\EnforcedSeparateBuilderTrait, \John\Eloquent\EnforcedSeparateCollectionTrait;

  public function userEmails() {
    return $this->hasMany('John\Eloquent\Test\Valid\Model\EmailType', 'email_types_id', 'email_types_id');
  }

}
