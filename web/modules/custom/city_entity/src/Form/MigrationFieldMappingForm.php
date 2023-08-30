<?php

namespace Drupal\city_entity\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MigrationFieldMappingForm.
 */
class MigrationFieldMappingForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'city_entity.migration_field_mapping',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'migration_field_mapping_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('city_entity.migration_field_mapping');

    $form['city_mapping'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City Mapping'),
      '#description' => $this->t('Map to Drupal entity field'),
      '#default_value' => $config->get('city_mapping'),
    ];
    // Add more form elements here for other fields
    
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('city_entity.migration_field_mapping')
      ->set('city_mapping', $form_state->getValue('city_mapping'))
      ->save();
    // Save more form elements here
  }

}
