<?php

class OneToManyTest extends \TestCase {

  public function testOneToManyGetsCorrectBuilder() {
    $userModel = new \Illuminate\Database\Eloquent\Test\Valid\Model\User();
    $userQuery = $userModel->newQuery();

    $userQuery->whereHas('userEmails', function($candidateQuery) {
      $this->assertInstanceOf(
        \Illuminate\Database\Eloquent\Test\Valid\Builder\UserEmail::class,
        $candidateQuery,
        'User queries userEmails and gets a userEmails collection class'
      );
    });
  }

}
