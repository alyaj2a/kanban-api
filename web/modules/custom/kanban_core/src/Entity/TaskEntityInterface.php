<?php

namespace Drupal\kanban_core\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Task entity entities.
 *
 * @ingroup kanban_core
 */
interface TaskEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Task entity name.
   *
   * @return string
   *   Name of the Task entity.
   */
  public function getName();

  /**
   * Sets the Task entity name.
   *
   * @param string $name
   *   The Task entity name.
   *
   * @return \Drupal\kanban_core\Entity\TaskEntityInterface
   *   The called Task entity entity.
   */
  public function setName($name);

  /**
   * Gets the Task entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Task entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Task entity creation timestamp.
   *
   * @param int $timestamp
   *   The Task entity creation timestamp.
   *
   * @return \Drupal\kanban_core\Entity\TaskEntityInterface
   *   The called Task entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Task entity published status indicator.
   *
   * Unpublished Task entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Task entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Task entity.
   *
   * @param bool $published
   *   TRUE to set this Task entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\kanban_core\Entity\TaskEntityInterface
   *   The called Task entity entity.
   */
  public function setPublished($published);

}
