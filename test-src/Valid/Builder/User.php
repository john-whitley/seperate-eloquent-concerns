<?php


namespace John\Eloquent\Test\Valid\Builder;

class User extends \Illuminate\Database\Eloquent\Builder {

  public function nameIsNotNull() {
    $query = $this->query;

    $query->whereNotNull('name');

    return $this;
  }

}
