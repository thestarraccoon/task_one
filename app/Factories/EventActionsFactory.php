<?php

namespace App\Factories;

use App\Interfaces\EventServiceInterface;
use App\Services\SubscribeOnEventService;
use App\Services\UnsubscribeOnEventService;
use InvalidArgumentException;

class EventActionsFactory
{
    public static function actionWithEvent(string $type): EventServiceInterface
    {
        switch ($type) {
            case 'subscribe':
                return new SubscribeOnEventService();
            case 'unsubscribe':
                return new UnsubscribeOnEventService();
            default:
                throw new InvalidArgumentException("Unsupported action: $type");
        }
    }
}
