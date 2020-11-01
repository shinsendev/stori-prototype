<?php

declare(strict_types=1);


namespace App\Component\Action;


use App\Component\Subject\SubjectInterface;

class Action
{
    private string $title;
    private array $sources;
    private array $target;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

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

    /**
     * @return array
     */
    public function getSources(): array
    {
        return $this->sources;
    }

    public function addSource(SubjectInterface $source): void
    {
        $this->sources[] = $source;
    }

    /**
     * @param array $sources
     */
    public function setSources(array $sources): void
    {
        $this->sources = $sources;
    }

    /**
     * @return array
     */
    public function getTarget(): array
    {
        return $this->target;
    }

    /**
     * @param array $target
     */
    public function setTarget(array $target): void
    {
        $this->target = $target;
    }

    public function addTarget(SubjectInterface $target)
    {
        $this->target[] = $target;
    }

}