<?php
/**
 * @file
 * Contains \Drupal\when_counter\Controller\WhenController.
 */
namespace Drupal\when_counter\Controller;

use Drupal\when_counter\WhenCounterService;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WhenController extends ControllerBase {
 
  /**
   * @var \Drupal\when_counter\WhenCountereService
   */
  public $whenCounterService;
 
  /**
   * {@inheritdoc}
   */
  public function __construct(WhenCounterService $whenCounterService) {
    $this->whenCounterService = $whenCounterService;
  }
 
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('when_counter.when_counter_service')
    );
  }
  
  public function content() {
    return [
      '#markup' => $this->whenCountereService->getWhenCounterValue()
    ];
  }
}
