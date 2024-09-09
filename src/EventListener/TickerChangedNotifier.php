<?php
declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Ticker;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

/**
 * Simple listener for ticker updates
 *
 * Changes updatedAt field for entity, no reason to add gedmo extension to project
 */
#[AsEntityListener(event: Events::prePersist, method: 'writeUpdatedAt', entity: Ticker::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'writeUpdatedAt', entity: Ticker::class)]
class TickerChangedNotifier
{
    public function writeUpdatedAt(Ticker $ticker): void
    {
        /**
         * We react on any entity update, so no checks here
         */
        $ticker->setUpdatedAt(new DateTime());
    }
}
