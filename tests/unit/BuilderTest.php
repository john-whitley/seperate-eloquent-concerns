<?php

class BuilderTest extends \TestCase {

  /**
   * Test that the builder can be generated from a valid class
   */
  public function testValidUserCanMakeBuilderInstance() {
    $userModel = new \John\Eloquent\Test\Valid\Model\User();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Model\User::class,
      $userModel,
      'User model is a valid model class'
    );

    $userBuilder = $userModel->newQuery();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Builder\User::class,
      $userBuilder,
      'User builder is a valid builder class'
    );
    $this->assertInstanceOf(
      \Illuminate\Database\Eloquent\Builder::class,
      $userBuilder,
      'User builder is a valid child of Eloquent\Builder'
    );
  }

  /**
   * Test that the "scope" methods defined on the builder can be called
   * from the model.
   */
  public function testModelCanCallNameIsNotNullOnBuilder() {
    $userModel = new \John\Eloquent\Test\Valid\Model\User();
    $userQuery = $userModel->nameIsNotNull();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Builder\User::class,
      $userQuery,
      'Scope model can be called from the model when implemented on the builder'
    );

    $expected = '/select \\* from .users. where .name. is not null/';

    $this->assertRegExp(
      $expected,
      $userQuery->toSql(),
      'Scope model added the correct query.'
    );
  }

  /**
   * Test that the "scope" methods defined on the builder can be called
   * from the builder.
   */
  public function testBuilderCanCallNameIsNotNullOnBuilder() {
    $userModel = new \John\Eloquent\Test\Valid\Model\User();
    $userQuery = $userModel->newQuery();

    $this->assertInstanceOf(
      \John\Eloquent\Test\Valid\Builder\User::class,
      $userQuery,
      'Scope model can be called from the model when implemented on the builder'
    );

    $userQuery->nameIsNotNull();

    $expected = '/select \\* from .users. where .name. is not null/';

    $this->assertRegExp(
      $expected,
      $userQuery->toSql(),
      'Scope model added the correct query.'
    );
  }

  /**
   * Test that the correct exception will be thrown if the model is in
   * an invalid namespace.
   */
  public function testModelMustHaveCorrectName() {
    $this->expectException(\John\Eloquent\Exception\UnknownModelNamespaceException::class);

    $userModel = new \John\Eloquent\Test\Valid\M\User();
    $userQuery = $userModel->newQuery();
  }

  /**
   * Test that the correct exception will be thrown if the builder is
   * not defined.
   */
  public function testModelMustHaveCorrispondingBuilder() {
    $this->expectException(\John\Eloquent\Exception\MissingBuilderException::class);

    $userModel = new \John\Eloquent\Test\Valid\Model\MissingBuilder();
    $userQuery = $userModel->newQuery();
  }

  /**
   * Test that the correct exception will be thrown if the builder is
   * not a subclass of Eloquent\Builder.
   */
  public function testModelMustHaveValidCorrispondingBuilder() {
    $this->expectException(\John\Eloquent\Exception\BuilderNotBuilderException::class);

    $userModel = new \John\Eloquent\Test\Valid\Model\InvalidBuilder();
    $userQuery = $userModel->newQuery();
  }

}
