<?php

declare(strict_types=1);

namespace App\Component\Subject;

abstract class SubjectAbstract implements SubjectInterface
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}