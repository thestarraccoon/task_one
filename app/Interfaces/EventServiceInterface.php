<?php

namespace App\Interfaces;

interface EventServiceInterface
{
    public function actionOnEvent($user, $event): string;
}
