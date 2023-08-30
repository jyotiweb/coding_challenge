<?php

namespace Drupal\mongo_migrate\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FieldMappingForm.
 */
class FieldMappingForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'your_module.fieldmapping',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'field_mapping_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('your_module.fieldmapping');
    
    // Fetch your MongoDB fields and Drupal entity fields here
    // @TODO : Later Make it Dynamic
    $mongo_fields = ['_id', 'city', 'loc', 'pop', 'state'];
    $drupal_fields = ['title', 'field_city', 'field_location', 'field_population', 'field_state'];
    
    foreach ($mongo_fields as $mongo_field) {
      $form[$mongo_field] = [
        '#type' => 'select',
        '#title' => $this->t('Map MongoDB field: @field', ['@field' => $mongo_field]),
        '#options' => array_combine($drupal_fields, $drupal_fields),
        '#default_value' => $config->get($mongo_field),
      ];
    }
    
    return parent::buildForm($form, $form_state);
  }

  //@TODO : Validation for duplicate field mapping should be done.

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    
    // Get an editable config object.
    $config = \Drupal::configFactory()->getEditable('mongo_migrate.fieldmapping');
 
    // Fetch your MongoDB fields here
    $mongo_fields = ['_id', 'city', 'loc', 'pop', 'state'];
    
    foreach ($mongo_fields as $mongo_field) {
      $config->set($mongo_field, $form_state->getValue($mongo_field));
    }
    
    $config->save();
  }


}
