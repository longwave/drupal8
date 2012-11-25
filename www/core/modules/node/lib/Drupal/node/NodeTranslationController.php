<?php

/**
 * @file
 * Definition of Drupal\node\NodeTranslationController.
 */

namespace Drupal\node;

use Drupal\Core\Entity\EntityInterface;
use Drupal\translation_entity\EntityTranslationController;

/**
 * Defines the translation controller class for nodes.
 */
class NodeTranslationController extends EntityTranslationController {

  /**
   * Overrides EntityTranslationController::getAccess().
   */
  public function getAccess(EntityInterface $entity, $op) {
    return node_access($op, $entity);
  }

  /**
   * Overrides EntityTranslationController::entityFormAlter().
   */
  public function entityFormAlter(array &$form, array &$form_state, EntityInterface $entity) {
    parent::entityFormAlter($form, $form_state, $entity);

    // Move the translation fieldset to a vertical tab.
    if (isset($form['translation'])) {
      $form['translation'] += array(
        '#group' => 'additional_settings',
        '#weight' => 100,
        '#attributes' => array(
          'class' => array('node-translation-options'),
        ),
      );
    }
  }

  /**
   * Overrides EntityTranslationController::entityFormTitle().
   */
  protected function entityFormTitle(EntityInterface $entity) {
    $type_name = node_get_type_label($entity);
    return t('<em>Edit @type</em> @title', array('@type' => $type_name, '@title' => $entity->label()));
  }
}
