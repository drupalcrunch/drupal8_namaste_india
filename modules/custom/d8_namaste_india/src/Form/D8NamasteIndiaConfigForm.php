<?php

/**
 * @file
 * Contains \Drupal\d8_namaste_india\Form\D8NamasteIndiaConfigForm.
 */

namespace Drupal\d8_namaste_india\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure D8NamasteIndiaConfigForm settings for this site.
 */
class D8NamasteIndiaConfigForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'd8_namaste_india_admin_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return ['d8_namaste_india.page'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('d8_namaste_india.page');
        
        $form['d8_namaste_india_guest_name'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Guest\'s Name'),
            '#default_value' => $config->get('name'),
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $this->config('d8_namaste_india.page')
                ->set('name', $form_state->getValue('d8_namaste_india_guest_name'))
                ->save();

        parent::submitForm($form, $form_state);
    }

}
