<?php

namespace Drupal\form_api_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements the SimpleForm form controller.
 *
 * This example demonstrates a simple form with a single text input element. We
 * extend FormBase which is the simplest form base class used in Drupal.
 *
 * @see \Drupal\Core\Form\FormBase
 */
class InputStaffList extends FormBase {

  /**
   * Build the simple form.
   *
   * A build form method constructs an array that defines how markup and
   * other form elements are included in an HTML form.
   *
   * @param array $form
   *   Default form array structure.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Object containing current form state.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  // empl-id, full_name, state, lga, town, street, dob, dofa, dopa, gl, step, qualification, rank, toa

    

    $form['emp'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Employee ID'),
      
      '#required' => TRUE,
    ];

    $form['full_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      
      //'#required' => TRUE,
    ];

    $form['state'] = [
      '#type' => 'textfield',
      '#title' => $this->t('State'),
      
    //  '#required' => TRUE,
    ];

    $form['lga'] = [
      '#type' => 'textfield',
      '#title' => $this->t('LGA'),
      
    //  '#required' => TRUE,
    ];

    $form['town'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Town'),
     
  //    '#required' => TRUE,
    ];  

    $form['street'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Street'),
      
   //   '#required' => TRUE,
    ];

    $form['dob'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Date of Birth'),
      
    //  '#required' => TRUE,
    ];

    $form['dofa'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Date of First Appointment'),
    
     // '#required' => TRUE,
    ];  

    $form['dopa'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Date of Present Appointment'),
     
   //   '#required' => TRUE,
    ];

    $form['gl'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Grade Level'),
     
    //  '#required' => TRUE,
    ];

    $form['step'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Step'),
     
      //'#required' => TRUE,
    ];

    $form['qualification'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Qualification'),
     
      //'#required' => TRUE,
    ];

    $form['rank'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Rank'),
      
     // '#required' => TRUE,
    ];

    $form['toa'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Time of Appointment'),
      //'#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;


    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * Getter method for Form ID.
   *
   * The form ID is used in implementations of hook_form_alter() to allow other
   * modules to alter the render array built by this form controller. It must be
   * unique site wide. It normally starts with the providing module's name.
   *
   * @return string
   *   The unique ID of the form defined by this class.
   */
  public function getFormId() {
    return 'Input Staff List';
  }



  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {



    $tin = $form_state->getValue('emp_id');
    $full_name = $form_state->getValue('full_name');
    $state = $form_state->getValue('state');
    $lga = $form_state->getValue('lga');
    $town = $form_state->getValue('town');
    $street = $form_state->getValue('street');
    $dob = $form_state->getValue('dob');
    $dofa = $form_state->getValue('dofa');
    $dopa = $form_state->getValue('dopa');
    $gl = $form_state->getValue('gl');
    $step = $form_state->getValue('step');
    $qualification = $form_state->getValue('qualification');
    $rank = $form_state->getValue('rank');
    $toa = $form_state->getValue('toa');
    


    $datetime = date('Y-m-d H:i:s');

    $query = \Drupal::database()->insert('_stafflist');
    $query->fields([
      'emp_id',
      'full_name',
      'state',
      'lga',
      'town',
      'street',
      'dob',
      'dofa',
      'dopa',
      'gl',
      'step',
      'qualification',
      'rank',
      'toa',
      'datetime'
    ]);
    $query->values([
      $emp_id,
      $full_name,
      $state,
      $lga,
      $town,
      $street,
      $dob,
      $dofa,
      $dopa,
      $gl,
      $step,
      $qualification,
      $rank,
      $toa,
      $datetime,
    ]); 

    $query->execute();

    $this->messenger()->addMessage($this->t('Record added.'));
  }

}
