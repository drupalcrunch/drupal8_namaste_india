<?php

/**
 * @file
 * Contains \Drupal\d8_namaste_india\Controller\D8NamasteIndiaBlockController.
 */

namespace Drupal\d8_namaste_india\Controller;

use Drupal\Core\Controller\Controller;
use Drupal\Core\Url;

class D8NamasteIndiaBlockController {

    /**
     * A simple controller method to explain what the block example is about.
     */
    public function description() {
        // Make a link from a route to the block admin page.
        $url = Url::fromRoute('block.admin_display');
        $block_admin_link = \Drupal::l(t('the block admin page'), $url);

        // Put the link into the content.
        $build = array(
            '#markup' => t('Example of Custom Block. <br>Try to enable and configure custom block by clicking "Place Block" button on !block_admin_link.', array(
                '!block_admin_link' => $block_admin_link,
                    )
            ),
        );
        return $build;
    }

}
