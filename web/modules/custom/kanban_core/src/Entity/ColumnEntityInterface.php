<?php

namespace Drupal\kanban_core\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Column entity entities.
 *
 * @ingroup kanban_core
 */
interface ColumnEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Column entity name.
   *
   * @return string
   *   Name of the Column entity.
   */
  public function getName();

  /**
   * Sets the Column entity name.
   *
   * @param string $name
   *   The Column entity name.
   *
   * @return \Drupal\kanban_core\Entity\ColumnEntityInterface
   *   The called Column entity entity.
   */
  public function setName($name);

  /**
   * Gets the Column entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Column entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Column entity creation timestamp.
   *
   * @param int $timestamp
   *   The Column entity creation timestamp.
   *
   * @return \Drupal\kanban_core\Entity\ColumnEntityInterface
   *   The called Column entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Column entity published status indicator.
   *
   * Unpublished Column entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Column entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Column entity.
   *
   * @param bool $published
   *   TRUE to set this Column entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\kanban_core\Entity\ColumnEntityInterface
   *   The called Column entity entity.
   */
  public function setPublished($published);

}
