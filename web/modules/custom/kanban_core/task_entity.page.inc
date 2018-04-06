<?php

/**
 * @file
 * Contains task_entity.page.inc.
 *
 * Page callback for Task entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Task entity templates.
 *
 * Default template: task_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_task_entity(array &$variables) {
  // Fetch TaskEntity Entity Object.
  $task_entity = $variables['elements']['#task_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
