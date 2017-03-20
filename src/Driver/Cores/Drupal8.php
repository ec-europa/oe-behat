<?php

namespace Europa\Drupal\Driver\Cores;

use Assert\Assert;
use Drupal\Driver\Cores\Drupal8 as OriginalDrupal8;

/**
 * Drupal8 driver.
 *
 * @package Europa\Drupal\Driver\Cores
 */
class Drupal8 extends OriginalDrupal8 implements CoreInterface {

  /**
   * {@inheritdoc}
   */
  public function getEntityIdByLabel($entity_type, $bundle, $label) {
    /** @var \Drupal\node\NodeStorage $storage */
    $storage = \Drupal::entityTypeManager()->getStorage($entity_type);
    $bundle_key = $storage->getEntityType()->getKey('bundle');
    $label_key = $storage->getEntityType()->getKey('label');

    $query = \Drupal::entityQuery($entity_type);
    if ($bundle) {
      $query->condition($bundle_key, $bundle);
    }
    $query->condition($label_key, $label);
    $query->range(0, 1);

    $result = $query->execute();
    Assert::that($result)->notEmpty(__METHOD__ . ": No Entity {$entity_type} with name {$label} found.");
    return current($result);
  }

}
