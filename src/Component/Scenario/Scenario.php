<?php

declare(strict_types=1);

namespace App\Component\Scenario;

use App\Component\Scene\Scene;

class Scenario
{
    private string $title;
    private array $scenes;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function addScene(Scene $scene)
    {
        $this->scenes[] = $scene;
    }

    /**
     * @return array
     */
    public function getScenes(): array
    {
        return $this->scenes;
    }
}