<?php

class BelongsToTest extends \TestCase {

  public function testBelongsToGetsCorrectBuilder() {
    $userEmailModel = new \Illuminate\Database\Eloquent\Test\Valid\Model\UserEmail();
    $userEmailQuery = $userEmailModel->newQuery();

    $userEmailQuery->whereHas('user', function($candidateQuery) {
      $this->assertInstanceOf(
        \Illuminate\Database\Eloquent\Test\Valid\Builder\User::class,
        $candidateQuery,
        'UserEmail queries user and gets a user collection class'
      );
    });
  }

}
