<?php

namespace Drupal\kanban_core;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Board entity entity.
 *
 * @see \Drupal\kanban_core\Entity\BoardEntity.
 */
class BoardEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\kanban_core\Entity\BoardEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished board entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published board entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit board entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete board entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add board entity entities');
  }

}
