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
    $form['email'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Secret Data that you want to encrypt.')
    );
    $form['show'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit '),
    );
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
     if (!isset($form_state['values']['email'])) {
      $this->setFormError('email', $form_state, $this->t('Data must be set'));
     } 
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
   drupal_set_message($this->t('Your email address is @email', array('@email' => $form_state['values']['email'])));
  }
}
