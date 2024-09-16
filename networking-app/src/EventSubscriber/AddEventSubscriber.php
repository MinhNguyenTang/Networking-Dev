<?php

namespace App\EventSubscriber;

use App\Entity\Event;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class AddEventSubscriber implements EventSubscriberInterface
{
    public function __construct(private Security $security)
    {
    }
    
    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!$entity instanceOf Event) {
            return;
        }

        $user = $this->security->getUser();
        if ($user) {
            $entity->setUser($user);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }
}
