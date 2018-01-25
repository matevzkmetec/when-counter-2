<?php

namespace Drupal\when_counter\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\when_counter\WhenCounterService;

/**
 * Provides a 'When Counter' Block.
 *
 * @Block(
 *   id = "when_block",
 *   admin_label = @Translation("When block"),
 *   category = @Translation("When Counter"),
 * )
 */
class WhenBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $whenCounterService = \Drupal::service('when_counter.when_counter_service');
    $daysbetween = $whenCounterService->getWhenCounterValue();
            if ($daysbetween > 0) {
        return array ('#markup' => ('Days left to event start:') . (' ') . $daysbetween);
        } elseif ($daysbetween < 0) {
            return array ('#markup' => ('The event has ended.'));
        } else {
            return array ('#markup' => ("This is today's event."));
        }
  }
    
  /**
  * {@inheritdoc}
  */
  public function getCacheMaxAge() {
  return 0;
  }
    
}