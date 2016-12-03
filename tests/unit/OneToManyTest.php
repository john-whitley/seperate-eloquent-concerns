<?php

class OneToManyTest extends \TestCase {

  public function testOneToManyGetsCorrectBuilder() {
    $userModel = new \John\Eloquent\Test\Valid\Model\User();
    $userQuery = $userModel->newQuery();

    $userQuery->whereHas('userEmails', function($candidateQuery) {
      $this->assertInstanceOf(
        \John\Eloquent\Test\Valid\Builder\UserEmail::class,
        $candidateQuery,
        'User queries userEmails and gets a userEmails collection class'
      );
    });
  }

}
