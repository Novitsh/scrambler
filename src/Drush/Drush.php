<?php
/**
 * @file
 * Drush class for the scrambler module.
 */

namespace Drupal\scrambler\Drush;

use Drupal\scrambler\API;

/**
 * Drush class for the scrambler module.
 */
class Drush {

  /**
   * Contains the API object.
   *
   * @var \Drupal\scrambler\API;
   */
  private $api;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->api = new API();
  }

  /**
   * Acknowledge execution and start scrambling.
   */
  public function execute() {
    if ($this->proceed()) {

      $this->api->scramble();

      drush_log(dt('Successfully scrambled fields.'), 'ok');
    }
  }

  /**
   * Acknowlodge to proceed.
   *
   * @return bool
   *   Returns TRUE if choice is yes.
   */
  private function proceed() {
    return drush_choice(
            array(TRUE => 'Yes'), 'Are you sure to scramble the database? Be sure that you are not executing it on the production database.'
    );
  }

}
