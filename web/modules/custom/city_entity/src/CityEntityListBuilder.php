<?php

namespace Drupal\city_entity;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of City.
 */
class CityEntityListBuilder extends ConfigEntityListBuilder
{

    /**
     * {@inheritdoc}
     */
    public function buildHeader()
    {
        $row['id'] = $this->t('Machine name');
        $header['city'] = $this->t('City');
        $header['longitude'] = $this->t('longitude');
        $header['latitude'] = $this->t('latitude');
        $header['pop'] = $this->t('Population');
        $header['state'] = $this->t('State');

        return $header + parent::buildHeader();
    }

    /**
     * {@inheritdoc}
     */
    public function buildRow(EntityInterface $entity)
    {
        $row['id'] = $entity->id();
        $header['city'] = $entity->getCity();
        $header['longitude'] = $entity->getLongitude();
        $header['latitude'] = $entity->getLatitude();
        $header['pop'] = $entity->getPopulation();
        $header['state'] = $entity->getState();
        $row['status'] = $entity->status() ? $this->t('Enabled') : $this->t('Disabled');
        return $row + parent::buildRow($entity);
    }


    /**
     * {@inheritdoc}
     */
    public function getDefaultOperations(EntityInterface $entity)
    {
        $operations = parent::getDefaultOperations($entity);
        $operations['preview'] = array(
            'title' => t('Preview'),
            'weight' => 20,
            'url' => $this->ensureDestination($entity->toUrl('preview-page',[$entity->id()])),
        );
        return $operations;
    }

}
