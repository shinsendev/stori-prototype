<?php

declare(strict_types=1);

namespace App\Component\Scenario;

use App\Component\Action\ActionInterface;

class Scenario
{
    private array $actions;

    /**
     * @return array
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @param array $actions
     */
    public function setActions(array $actions): void
    {
        $this->actions = $actions;
    }
}