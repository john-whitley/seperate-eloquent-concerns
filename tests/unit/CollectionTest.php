<?php

class CollectionTest extends \TestCase {

  /**
   * Test that the collection can be generated from a valid class
   */
  public function testValidUserCanMakeCollectionInstance() {
    $userModel = new \John\Eloquent\Test\Valid\Model\User();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Model\User::class,
      $userModel,
      'User model is a valid model class'
    );

    $userCollection = $userModel->all();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Collection\User::class,
      $userCollection,
      'User collection is a valid collection class'
    );
    $this->assertInstanceOf(
      \Illuminate\Database\Eloquent\Collection::class,
      $userCollection,
      'User collection is a valid child of Eloquent\Collection'
    );
  }

  /**
   * Test that the correct exception will be thrown if the model is in
   * an invalid namespace.
   */
  public function testModelMustHaveCorrectName() {
    $this->expectException(\John\Eloquent\Exception\UnknownModelNamespaceException::class);

    $userModel = new \John\Eloquent\Test\Valid\M\User();
    $userModel->all();
  }

  /**
   * Test that the correct exception will be thrown if the collection is
   * not defined.
   */
  public function testModelMustHaveCorrispondingCollection() {
    $this->expectException(\John\Eloquent\Exception\MissingCollectionException::class);

    $userModel = new \John\Eloquent\Test\Valid\Model\MissingCollection();
    $userModel->all();
  }

  /**
   * Test that the correct exception will be thrown if the collection is
   * not a subclass of Eloquent\Collection.
   */
  public function testModelMustHaveValidCorrispondingCollection() {
    $this->expectException(\John\Eloquent\Exception\CollectionNotCollectionException::class);

    $userModel = new \John\Eloquent\Test\Valid\Model\InvalidCollection();
    $userModel->all();
  }

}
