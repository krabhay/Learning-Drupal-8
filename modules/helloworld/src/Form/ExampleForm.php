<?php
/**
 * Created by PhpStorm.
 * User: Keven
 * Date: 8/1/15
 * Time: 02:20
 */

namespace Drupal\helloworld\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class ExampleForm extends FormBase {

    /**
     * {@inheritdoc}.
     */
    public function getFormId() {
        return 'example_form';
    }

    /**
     * {@inheritdoc}.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['phone_number'] = array(
            '#type' => 'tel',
            '#title' => $this->t('Your phone number')
        );
        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('phone_number')) < 3) {
            $form_state->setErrorByName('phone_number', $this->t('The phone number is too short. Please enter a full phone number.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        drupal_set_message($this->t('Your phone number is @number', array('@number' => $form_state->getValue('phone_number'))));
    }

}