<?php

/**
 * @file
 * Contains board_entity.page.inc.
 *
 * Page callback for Board entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Board entity templates.
 *
 * Default template: board_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_board_entity(array &$variables) {
  // Fetch BoardEntity Entity Object.
  $board_entity = $variables['elements']['#board_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
