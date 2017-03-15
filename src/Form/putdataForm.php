<?php

/**
 * @file
 * Contains \Drupal\client_side_encryption\Form\putdataForm.
 */

namespace Drupal\client_side_encryption\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class putdataForm extends FormBase {
  public function getFormId() {
    // Unique ID of the form.
    return 'putdataForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    // Create a $form API array.
    $form['data'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Secret Data that you want to encrypt.')
    );
    $form['show'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Encrypt!'),
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
     if ($form_state->getValue('data')==NULL) {
      $form_state->setErrorByName('data', t('Data field can\'t be empty'));
     } 
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
   drupal_set_message($this->t('Your data is @data', array('@data' =>  $form_state->getValue('data'))));

  }
}
