<?php

namespace Drupal\client_side_encryption\Controller;

use Drupal\Core\Controller\ControllerBase;

class client_side_encryptionController extends ControllerBase {

  /**
   * Display the markup for viewData page.
   *
   * @return array
   */
  public function viewData() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('The secret data is displayed below:'),
    );
  }

  /**
   * Display the markup for storeData page.
   *
   * @return array
   */
  public function storeData() {
    return array(
      '#type' => 'markup',
      '#markup' => $this->t('Enter your plain text you want to encrypt below:'),
    );
  }

}
