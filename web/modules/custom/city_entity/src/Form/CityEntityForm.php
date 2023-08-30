<?php

namespace Drupal\city_entity\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CityEntityForm.
 */
class CityEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $city_entity = $this->entity;

    // Add fields here
    $form['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $city_entity->city,
      '#required' => TRUE,
    ];

    $form['state'] = [
      '#type' => 'textfield',
      '#title' => $this->t('State'),
      '#default_value' => $city_entity->state,
      '#required' => TRUE,
    ];

    $form['pop'] = [
      '#type' => 'number',
      '#title' => $this->t('Population'),
      '#default_value' => $city_entity->pop,
      '#required' => TRUE,
    ];

    $form['loc'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Location'),
      '#default_value' => $city_entity->loc,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $city_entity = $this->entity;
    $status = $city_entity->save();

    if ($status) {
      $this->messenger()->addMessage($this->t('Saved the %label City Entity.', [
        '%label' => $city_entity->label(),
      ]));
    }
    else {
      $this->messenger()->addMessage($this->t('The %label City Entity was not saved.', [
        '%label' => $city_entity->label(),
      ]), 'error');
    }
    $form_state->setRedirect('entity.city_entity.collection');
  }

  /**
   * {@inheritdoc}
   */
  protected function actions(array $form, FormStateInterface $form_state) {
    $actions = parent::actions($form, $form_state);
    $entity = $this->entity;
    if (!$entity->isNew()){
        $actions['preview'] = [
            '#type' => 'link',
            '#title' => $this->t('Preview'),
            '#attributes' => [
                'class' => ['button', 'button--primary'],
            ],
            '#url' => $entity->toUrl('preview-page',[$entity->id()])
        ];
    }
    return $actions;
  }
}
