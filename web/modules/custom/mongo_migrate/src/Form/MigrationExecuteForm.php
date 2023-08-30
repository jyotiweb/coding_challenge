<?php

namespace Drupal\mongo_migrate\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\mongo_migrate\MongoDataMigrationService;

/**
 * Class MigrationExecuteForm.
 */
class MigrationExecuteForm extends FormBase {

  protected $migrationService;

  public function __construct(MongoDataMigrationService $migration_service) {
    $this->migrationService = $migration_service;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('mongo_migrate.migration_service')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'migration_execute_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Fetch the last migration status and time.
    $config = \Drupal::config('mongo_migrate.migration_status');
    $last_time = $config->get('last_time') ?? 'Never';
    $status = $config->get('status') ?? 'Unknown';

    $form['status'] = [
      '#markup' => $this->t('Last migration run: @time, Status: @status', ['@time' => $last_time, '@status' => $status]),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Run Migration'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Use the migration service to execute the migration.
    $this->migrationService->executeMigration();

    // Update the last migration status and time.
    $config = \Drupal::configFactory()->getEditable('mongo_migrate.migration_status');
    $config->set('last_time', date('Y-m-d H:i:s'))->save();
    $config->set('status', 'Success')->save();
  }

}

