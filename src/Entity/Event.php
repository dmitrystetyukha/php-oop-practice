<?php

namespace Entity;

class Event
{
    private int    $id;
    private string $name;
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
