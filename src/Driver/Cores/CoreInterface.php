<?php

namespace Europa\Drupal\Driver\Cores;

use Drupal\Driver\Cores\CoreInterface as OriginalCoreInterface;

/**
 * Interface CoreInterface.
 *
 * @package Europa\Drupal\Driver\Cores
 */
interface CoreInterface extends OriginalCoreInterface {

  /**
   * Get entity ID given its type, bundle and label.
   *
   * @param string $entity_type
   *   Entity type machine name.
   * @param string $bundle
   *   Entity bundle machine name, can be empty.
   * @param string $label
   *   Entity name.
   *
   * @return int
   *   Entity ID.
   */
  public function getEntityIdByLabel($entity_type, $bundle, $label);

}
