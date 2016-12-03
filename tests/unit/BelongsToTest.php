<?php

class BelongsToTest extends \TestCase {

  public function testBelongsToGetsCorrectBuilder() {
    $userEmailModel = new \John\Eloquent\Test\Valid\Model\UserEmail();
    $userEmailQuery = $userEmailModel->newQuery();

    $userEmailQuery->whereHas('user', function($candidateQuery) {
      $this->assertInstanceOf(
        \John\Eloquent\Test\Valid\Builder\User::class,
        $candidateQuery,
        'UserEmail queries user and gets a user collection class'
      );
    });
  }

}
