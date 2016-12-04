<?php

namespace Illuminate\Database\Eloquent\Test\Valid\Model;

class UserEmail extends \Illuminate\Database\Eloquent\Model {
  use \Illuminate\Database\Eloquent\SeparateConcernsTrait, \Illuminate\Database\Eloquent\EnforcedSeparateBuilderTrait, \Illuminate\Database\Eloquent\EnforcedSeparateCollectionTrait;

  public function user() {
    return $this->belongsTo('Illuminate\Database\Eloquent\Test\Valid\Model\User', 'users_id', 'users_id');
  }

  public function emailType() {
    return $this->belongsTo('Illuminate\Database\Eloquent\Test\Valid\Model\EmailType', 'email_types_id', 'email_types_id');
  }

}
