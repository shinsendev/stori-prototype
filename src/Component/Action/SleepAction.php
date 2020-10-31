<?php

declare(strict_types=1);

namespace App\Component\Action;

use App\Component\Actor\ActorInterface;

class SleepAction implements ActionInterface
{
    public function sleep(ActorInterface $actor)
    {
        return sprintf('%s sleeps', $actor->getFullname());
    }
}