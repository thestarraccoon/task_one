<?php

namespace App\Services;

use App\Interfaces\EventServiceInterface;

class SubscribeOnEventService implements EventServiceInterface
{
    public function actionOnEvent($user, $event): string
    {
        $user->events()->syncWithoutDetaching([$event->event_id]);

        $result = "Вы подписаны на событие";

        return $result;
    }
}
