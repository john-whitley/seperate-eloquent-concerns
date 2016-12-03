<?php

namespace John\Eloquent\Test\Valid\Model;

class UserEmail extends \Illuminate\Database\Eloquent\Model {
  use \John\Eloquent\BaseTrait, \John\Eloquent\EnforcedSeparateBuilderTrait, \John\Eloquent\EnforcedSeparateCollectionTrait;

  public function user() {
    return $this->belongsTo('John\Eloquent\Test\Valid\Model\User', 'users_id', 'users_id');
  }

  public function emailType() {
    return $this->belongsTo('John\Eloquent\Test\Valid\Model\EmailType', 'email_types_id', 'email_types_id');
  }

}
