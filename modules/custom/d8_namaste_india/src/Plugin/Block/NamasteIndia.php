<?php

/**
 * @file
 * Contains \Drupal\d8_namaste_india\Plugin\Block\NamasteIndia.
 */

namespace Drupal\d8_namaste_india\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides Namaste India Block.
 *
 * @Block(
 *  id = "d8_namaste_india_block",
 *  admin_label = @Translation("Namaste India Block"),
 *  category = @Translation("Blocks")
 * )
 */
class NamasteIndia extends BlockBase implements BlockPluginInterface {

    /**
     * {@inheritdoc}
     * Demonstrate use of the configuration of instances of the block
     */
    public function build() {
		
        $blockconfig = $this->getConfiguration();
        $name = $this->t('Ji!!!');
        if (!empty($blockconfig['name'])) {
            $name = $blockconfig['name'];
        }
        return array(
            '#markup' => $this->t('Namaste, @name!', array(
                '@name' => $name,
                    )
            ),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();
		
        $form['d8_namaste_india_block_settings'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Who'),
            '#description' => $this->t('Whom do you want to say namaste to?'),
            '#default_value' => isset($config['name']) ? $config['name'] : ''
        );

        return $form;
    }

    /**
     * {@inheritdoc}
     * Adding this code will mean that the form will process, and the input 
     * to the form will be saved in the configuration for that instance of 
     * the block, independent of the other instances of the block. 
     * The block is still not making use of the results of 
     * the configuration change, however. That is in the next book page.
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        $this->setConfigurationValue('name', $form_state->getValue('d8_namaste_india_block_settings'));
    }
	
	/*
	* This value will be used when the module is installed. 
	* So to verify, uninstall and install your module. 
	* And when you add your block again to a region, you should see the default value.
	*/
    public function defaultConfiguration() {
        $default_config_block = \Drupal::config('d8_namaste_india.settings');
        return array(
            'name' => $default_config_block->get('d8_namaste_india_block.name')
        );
    }
}
