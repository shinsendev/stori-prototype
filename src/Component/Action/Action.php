<?php

declare(strict_types=1);


namespace App\Component\Action;


use App\Component\Place\PlaceInterface;
use App\Component\Subject\SubjectInterface;

class Action
{
    private string $title;
    private array $sources = [];
    private array $targets = [];
    private array $destinations = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSources(): array
    {
        return $this->sources;
    }

    public function addSource(SubjectInterface $source): void
    {
        $this->sources[] = $source;
    }

    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }

    public function getTargets(): array
    {
        return $this->targets;
    }

    public function setTargets(array $targets): void
    {
        $this->targets = $targets;
    }

    public function addTarget(SubjectInterface $target)
    {
        $this->targets[] = $target;
    }

    public function getDestinations(): array
    {
        return $this->destinations;
    }

    public function addDestination(PlaceInterface $destination)
    {
        $this->destinations[] = $destination;
    }

}