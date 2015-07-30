<?php

/**
 * @file
 * Contains \Drupal\d8_namaste_india\Controller\D8NamasteIndiaController.
 */

namespace Drupal\d8_namaste_india\Controller;

use Drupal\Core\Controller\ControllerBase;

class D8NamasteIndiaController extends ControllerBase {

    public function content() {

        /*
          return array(
          '#type' => 'markup',
          '#markup' => t('Namaste India!!!'),
          );
         */

        $guest = $this->t('Webchick');

        $default_config_block = \Drupal::config('d8_namaste_india.page');

        if (!empty($default_config_block->get('name'))) {
            $guest = $default_config_block->get('name');
        }

        return array(
            '#type' => 'markup',
            '#markup' => t('Namaste @name!!!', array('@name' => $guest,)),
        );
    }

}

?>