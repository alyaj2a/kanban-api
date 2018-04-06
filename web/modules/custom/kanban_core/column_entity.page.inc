<?php

/**
 * @file
 * Contains column_entity.page.inc.
 *
 * Page callback for Column entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Column entity templates.
 *
 * Default template: column_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_column_entity(array &$variables) {
  // Fetch ColumnEntity Entity Object.
  $column_entity = $variables['elements']['#column_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
