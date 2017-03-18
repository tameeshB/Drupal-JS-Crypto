<?php

namespace Drupal\client_side_encryption\Controller;

use Drupal\Core\Controller\ControllerBase;

class client_side_encryptionController extends ControllerBase {

  /**
   * Display the markup for viewData page.
   *
   * @return array
   */
  public function home() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Menu for this module<br>You can perform encryption operations on the client side using this module<br>Try it out:<br><ul><li><a href=":gen">Generate and store Keys</a></li><li><a href=":empty">Empty Keys</a></li><li><a href=":store">Encrypt data</a></li><li><a href=":view">Decrypt and View</a></li><ul>',array(':gen'=>'./gen',':empty'=>'./empty',':store'=>'./store',':view'=>'./view')),
    ];
  }

  /**
   * Display the markup for viewData page.
   *
   * @return array
   */
  public function viewData() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('The secret data is displayed below:'),
      '#attached' => [
        'library' => [
          'client_side_encryption/cryptJSview',
        ],
      ],
    ];
  }

  /**
   * Display the markup for storeData page.
   *
   * @return array
   */
  public function storeData() {
    $output= [];
    $output['cont'] = [
      '#type' => 'markup',
      '#markup' => $this->t('This page takes text input from the user and encrypts it before sending over the encrypted text to the backend.'),
      '#attached' => [
        'library' => [
          'client_side_encryption/cryptJSencrypt',
        ],
      ],
    ];
    $output['form']= \Drupal::formBuilder()->getForm('\Drupal\client_side_encryption\Form\putdataForm');
    return $output;
  }

  public function genKeys() {
    $output= [];
    $output['cont'] = [
      '#type' => 'markup',
      '#markup' => $this->t('This page lets you generate keys at the front end, if there isn\'t already a key and stores the private key on your browser and sends the public key to the server. You can view the keys in the console of your browser.'),
      '#attached' => [
        'library' => [
          'client_side_encryption/cryptJSgen',
        ],
      ],
    ];
    $output['status'] = [
      '#type' => 'markup',
      '#markup' => $this->t(''),
    ];
    redo:
    $pID=rand(1000,9999);
    $result = \Drupal::database()->query('SELECT accessKey FROM {cseStore} WHERE cid = :personID', array(':personID'=>$pID))->fetchAll();
    foreach ($result as $record) {
      $accessK = $record->accessKey;
    }
    if(!isset($accessK)){
      $accessK = $pID;
    }else{
      goto redo;
    }
    $output['pID'] = [
      '#type' => 'markup',
      '#markup' => $this->t('<span id="pid" style="display:none">'.$accessK.'</span>'),
    ];
    return $output;
  }

  public function emptyKeys() {
    $output= [];
    $output['cont'] = [
      '#type' => 'markup',
      '#markup' => $this->t('Keys emptied! <a href="@url">Generate Keys again!</a>',array('@url'=>'gen')),
      '#attached' => [
        'library' => [
          'client_side_encryption/cryptJSempty',
        ],
      ],
    ];
    $output['status'] = [
      '#type' => 'markup',
      '#markup' => $this->t(''),
    ];
    return $output;
  }

}
