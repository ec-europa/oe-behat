<?php

namespace EC\OpenEuropa\Drupal\DrupalExtension\ServiceContainer;

use Drupal\DrupalExtension\ServiceContainer\DrupalExtension as OriginalDrupalExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Class DrupalExtension.
 *
 * @package EC\OpenEuropa\Drupal\DrupalExtension\ServiceContainer
 */
class DrupalExtension extends OriginalDrupalExtension {

  /**
   * {@inheritdoc}
   */
  public function load(ContainerBuilder $container, array $config) {
    parent::load($container, $config);
    $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../../config'));
    $loader->load('overrides.yml');
    $loader->load('services.yml');
  }

}
