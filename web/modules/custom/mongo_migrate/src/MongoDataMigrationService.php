<?php

namespace Drupal\mongo_migrate;

use MongoDB\Client as MongoDBClient;
use Drupal\migrate\Plugin\MigrationPluginManagerInterface;
use Drupal\migrate\MigrateExecutable;
use Drupal\migrate\MigrateMessage;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class MongoDataMigrationService.
 */
class MongoDataMigrationService {

  /**
   * MongoDB client.
   *
   * @var \MongoDB\Client
   */
  protected $mongoClient;

  /**
   * The migration plugin manager.
   *
   * @var \Drupal\migrate\Plugin\MigrationPluginManagerInterface
   */
  protected $migrationPluginManager;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs a new MongoDataMigrationService object.
   *
   * @param \Drupal\migrate\Plugin\MigrationPluginManagerInterface $migration_plugin_manager
   *   The migration plugin manager.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(MigrationPluginManagerInterface $migration_plugin_manager, ConfigFactoryInterface $config_factory) {
    $this->migrationPluginManager = $migration_plugin_manager;
    $this->configFactory = $config_factory;
    $this->mongoClient = new MongoDBClient('mongodb://192.168.0.5:9999');
  }

  /**
   * Executes the data migration.
   */
  public function executeMigration() {
    // Connect to MongoDB and perform any setup tasks.
    $db = $this->mongoClient->selectDatabase('Blog');
    $collection = $db->selectCollection('content');

    // Retrieve the saved mappings from Drupal's configuration system.
    $config = $this->configFactory->get('mongo_migrate.fieldmapping');
    $mapping = $config->get();  // Replace 'your_mapping_key' with the actual key.

    // Load the migration entity.
    // Replace 'your_migration_id' with the actual migration ID.
    $migration = $this->migrationPluginManager->createInstance('mongo_city_to_drupal');

    // Dynamically set the 'process' pipeline for the migration based on saved mappings.
    $process = [];
    foreach ($mapping as $drupal_field => $mongo_field) {
      $process[$drupal_field] = $mongo_field;
    }
    $migration->set('process', $process);

    // Execute the migration.
    $migrate_executable = new MigrateExecutable($migration, new MigrateMessage());
    $result = $migrate_executable->import();

    // Check migration status and do something based on the result.
    // ...
  }
}