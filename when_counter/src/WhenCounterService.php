<?php
/**
* @file providing the service.
*
*/

namespace  Drupal\when_counter;

use Drupal\node\Entity\Node;

/**
 * Class WhenCounterService.
 *
 * @package Drupal\when_counter
 */
class WhenCounterService {

  /**
   * Returns a string that is a message to a user.
   *
   * @return string
   */
          
  public function __construct() {
    $today = date("m/d/Y");
    $node_id = \Drupal::routeMatch()->getRawParameter('node');
    $node = Node::load($node_id);
    $eventdate = $node->get('field_event_date')->value;   
      
    $todayTimestamp = strtotime($today);
    $eventdateTimestamp = strtotime($eventdate); 
      
    $inbetween = $eventdateTimestamp - $todayTimestamp;
    $daysbetween = floor($inbetween / (60*60*24));
      
    $this->when_counter_value = $daysbetween;
       
  }
    
  public function getWhenCounterValue() {
    return $this->when_counter_value;
  }
    
}