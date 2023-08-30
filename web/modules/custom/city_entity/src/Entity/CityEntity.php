<?php

// File location: city_entity/src/Entity/CityEntity.php

namespace Drupal\city_entity\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the City Entity entity.
 *
 * @ContentEntityType(
 *   id = "city_entity",
 *   label = @Translation("City Entity"),
 *   handlers = {
 *     "list_builder" = "Drupal\city_entity\CityEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\city_entity\Form\CityEntityForm",
 *       "edit" = "Drupal\city_entity\Form\CityEntityForm",
 *       "delete" = "Drupal\city_entity\Form\CityEntityDeleteForm",
 *     },
 *   },
 *   admin_permission = "administer city entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *  config_export = {
 *     "id",
 *     "city",
 *     "latitude",
 *     "longitude",
 *     "pop",
 *     "state"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/city_entity/{city_entity}",
 *     "add-form" = "/admin/structure/city_entity/add",
 *     "edit-form" = "/admin/structure/city_entity/{city_entity}/edit",
 *     "delete-form" = "/admin/structure/city_entity/{city_entity}/delete",
 *     "collection" = "/admin/structure/city_entity",
 *     "preview-page" = "/admin/structure/ball/{ball}/preview"
 *   },
 * )
 */
class CityEntity extends ContentEntityBase {

  /**
     * The city ID.
     *
     * @var string
     */
    protected $id;

    /**
     * The ball label.
     *
     * @var string
     */
    protected $city;

    /**
     * The ball status.
     *
     * @var bool
     */
    protected $loc;

    /**
     * The ball description.
     *
     * @var string
     */
    protected $pop;

    /**
     * The color of this ball.
     *
     * @var string
     */
    protected $state;


    /**
     * {@inheritdoc}
     */
    public function getCity() {
      return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function getLongitude() {
        return $this->latitude;
    }

    /**
     * {@inheritdoc}
     */
    public function getLatitude() {
        return $this->longitude;
    }

    /**
       * {@inheritdoc}
       */
      public function getPopulation() {
        return $this->pop;
    }

    /**
       * {@inheritdoc}
       */
      public function getState() {
        return $this->state;
    }

}
