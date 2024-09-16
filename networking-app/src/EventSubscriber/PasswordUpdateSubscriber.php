<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordUpdateSubscriber implements EventSubscriberInterface
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }
    
    public function onBeforeEntityPersistedEvent(BeforeEntityUpdatedEvent|BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceOf User) {
            return;
        }

        if (!is_null($entity->getPassword() && '' != $entity->getPassword())) {
            $entity->setPassword($this->passwordHasher->hashPassword($entity, $entity->getPassword()));
            $updatedAt = new \DateTimeImmutable();
            $entity->setUpdatedAt($updatedAt);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }
}
