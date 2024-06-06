<?php

namespace App\Services;

use App\Interfaces\EventServiceInterface;

class UnsubscribeOnEventService implements EventServiceInterface
{
    public function actionOnEvent($user, $event): string
    {
        $user->events()->detach($event);

        $result = "Вы отписались от события";

        return $result;
    }
}
