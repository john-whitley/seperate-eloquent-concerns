<?php

class TestCase extends \Orchestra\Testbench\TestCase {

  protected function getEnvironmentSetUp($app) {
    // Setup default database to use sqlite :memory:
    $app['config']->set('database.default', 'testbench');
    $app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
    ]);
  }

  protected function setUp() {
    parent::setUp();

    $this->loadMigrationsFrom([
      '--database' => 'testbench',
      '--realpath' => realpath(__DIR__.'/../database/migrations'),
    ]);

  }

}
