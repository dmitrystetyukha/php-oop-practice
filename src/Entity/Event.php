<?php

namespace Entity;

class Event
{
    private string $id;
    private string $name;

    public function __construct(
        string $id,
        string $name,
    ) {
        $this->id   = $id;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
