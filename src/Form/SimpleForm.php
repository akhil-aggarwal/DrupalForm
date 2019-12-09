<?php

namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our simple form class.
 */
class SimpleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalup_simple_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
    ];

    $form['age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age'),
    ];

    $form['age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age'),
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => t('gender'),
      '#description' => t('Specify ur Gender.'),
      '#options' => [
        t('Male'),
        t('Female'),
      ],
    ];

    $form['field_date'] = [
      '#type' => 'date',
      '#title' => 'Enter Your Date of Birth',
      '#format' => 'm/d/Y',
      '#description' => t('i.e. 09/06/2016'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->messenger()->addStatus($this->t('Your Name is @name', ['@name' => $form_state->getValue('name')]));
    $this->messenger()->addStatus($this->t('Your Age is @number', ['@number' => $form_state->getValue('age')]));
    $this->messenger()->addStatus($this->t('Your Gender is @gender, where 0-> Male & 1-> Female', ['@gender' => $form_state->getValue('gender')]));
    $this->messenger()->addStatus($this->t('Your D.O.B is @dob', ['@dob' => $form_state->getValue('field_date')]));

  }

}
