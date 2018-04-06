<?php

namespace Drupal\kanban_core\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Board entity entities.
 *
 * @ingroup kanban_core
 */
interface BoardEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Board entity name.
   *
   * @return string
   *   Name of the Board entity.
   */
  public function getName();

  /**
   * Sets the Board entity name.
   *
   * @param string $name
   *   The Board entity name.
   *
   * @return \Drupal\kanban_core\Entity\BoardEntityInterface
   *   The called Board entity entity.
   */
  public function setName($name);

  /**
   * Gets the Board entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Board entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Board entity creation timestamp.
   *
   * @param int $timestamp
   *   The Board entity creation timestamp.
   *
   * @return \Drupal\kanban_core\Entity\BoardEntityInterface
   *   The called Board entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Board entity published status indicator.
   *
   * Unpublished Board entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Board entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Board entity.
   *
   * @param bool $published
   *   TRUE to set this Board entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\kanban_core\Entity\BoardEntityInterface
   *   The called Board entity entity.
   */
  public function setPublished($published);

}
