<?php

namespace Drupal\client_side_encryption\Controller;

use Drupal\Core\Controller\ControllerBase;

class client_side_encryptionController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   */
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Enter your plain text below:'),
    );
  }

}