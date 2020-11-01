<?php

declare(strict_types=1);

namespace App\Component\Scene;

use App\Component\Action\Action;
use App\Component\Context\Context;

class Scene
{
    private array $actions;
    private Context $context;

    public function addAction(Action $action, Context $context = null)
    {
        $this->actions[] = $action;
        if ($context) {
            $this->context = $context;
        }
    }
}