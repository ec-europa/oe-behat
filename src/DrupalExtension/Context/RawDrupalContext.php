<?php

namespace Europa\Drupal\DrupalExtension\Context;

use Behat\Behat\Context\SnippetAcceptingContext;
use Drupal\DrupalExtension\Context\RawDrupalContext as OriginalRawDrupalContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class RawDrupalContext.
 *
 * @package Europa\Drupal\DrupalExtension\Context
 */
class RawDrupalContext extends OriginalRawDrupalContext implements ServiceContainerAwareInterface, SnippetAcceptingContext {

  /**
   * Service container instance.
   *
   * @var \Symfony\Component\DependencyInjection\ContainerBuilder
   */
  private $container;

  /**
   * {@inheritdoc}
   */
  public function setContainer(ContainerBuilder $container) {
    $this->container = $container;
  }

  /**
   * {@inheritdoc}
   */
  public function getContainer() {
    return $this->container;
  }

  /**
   * Get current Drupal core.
   *
   * @return \Europa\Drupal\Driver\Cores\CoreInterface|\Drupal\Driver\Cores\CoreInterface
   *   Drupal core object instance.
   */
  public function getCore() {
    return $this->getDriver()->getCore();
  }

}
