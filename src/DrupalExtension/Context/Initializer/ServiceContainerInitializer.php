<?php

namespace EC\OpenEuropa\Drupal\DrupalExtension\Context\Initializer;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\Initializer\ContextInitializer;
use EC\OpenEuropa\Drupal\DrupalExtension\Context\ServiceContainerAwareInterface;

/**
 * Class ServiceContainer.
 *
 * @package EC\OpenEuropa\Drupal\DrupalExtension\Context\Initializer
 */
class ServiceContainerInitializer implements ContextInitializer {

  /**
   * Service container instance.
   *
   * @var \Symfony\Component\DependencyInjection\ContainerBuilder
   */
  private $container;

  /**
   * ServiceContainerInitializer constructor.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
   *   Service container instance.
   *
   * @see \EC\OpenEuropa\Drupal\DrupalExtension\ServiceContainer\DrupalExtension::loadContextInitializer
   */
  public function __construct(ContainerBuilder $container) {
    $this->container = $container;
  }

  /**
   * Initializes provided context.
   *
   * @param \Behat\Behat\Context\Context $context
   *   Context instance.
   */
  public function initializeContext(Context $context) {
    if ($context instanceof ServiceContainerAwareInterface) {
      /** @var \EC\OpenEuropa\Drupal\DrupalExtension\Context\ServiceContainerAwareInterface $context */
      $context->setContainer($this->container);
    }
  }

}
