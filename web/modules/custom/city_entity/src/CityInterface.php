<?php

namespace Drupal\city_entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a City entity type.
 */
interface CityInterface extends ConfigEntityInterface {

    public function getCity();
    public function getLongitude();
    public function getLatitude();
    public function getPopulation();
    public function getState();
}
