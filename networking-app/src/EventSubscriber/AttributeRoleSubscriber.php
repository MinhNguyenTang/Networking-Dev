<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class AttributeRoleSubscriber implements EventSubscriberInterface
{
    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceOf User) {
            return;
        }

        if (empty($entity->getRoles()) || in_array('', $entity->getRoles())) {
            $entity->setRoles(['ROLE_USER']);
        }
    }

    public function onBeforeEntityUpdatedEvent(BeforeEntityUpdatedEvent $event): void 
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceOf User) {
            return;
        }

        if (empty($entity->getRoles())) {
            $entity->setRoles(['ROLE_USER']);
        }
        
        $roles = $entity->getRoles();
        if (in_array('ROLE_ADMIN', $roles)) {
            $entity->setRoles(['ROLE_ADMIN']);
        }
        else {
            $entity->setRoles(['ROLE_USER']);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityUpdatedEvent',
        ];
    }
}
