<?php

class Row
{
    private array $row;

    public function __construct(array $row)
    {
        $this->row = $row;
    }

    public function getRow(): array
    {
        return $this->row;
    }
}