<?php

declare(strict_types=1);

namespace App\Component\Subject\Actor;

class Character extends AbstractActor
{
    protected string $name;
    protected ?string $gender;

    public function __construct(string $name, ?string $gender = null)
    {
        $this->name = $name;
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}