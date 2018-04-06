<?php

namespace Drupal\kanban_core;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Column entity entity.
 *
 * @see \Drupal\kanban_core\Entity\ColumnEntity.
 */
class ColumnEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\kanban_core\Entity\ColumnEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished column entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published column entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit column entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete column entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add column entity entities');
  }

}
