<?php

namespace Drupal\city_entity\Controller;

use Drupal\Core\Controller\ControllerBase;

class CityEntityController extends ControllerBase
{
    public function preview($city)
    {
        $entity = \Drupal::entityTypeManager()
            ->getStorage('city_entity')
            ->load($city);
        $items = [
          'Label: ' => 
            $entity->id(),
            $entity->status(),
            $entity->get('description'),
            $entity->getCity(),
            $entity->getLongitude(),
            $entity->getLatitude(),
            $entity->getPopulation(),
            $entity->getState(),
            ];
        return array(
            '#theme' => 'item_list',
            '#items' => $items,
        );
    }
}
