<?php

class DataCollection
{
    private array $data = [];

    public function __construct(array $data = [])
    {
        foreach ($data as $value){
            $this->addData($value);
        }
    }

    public function addData(Data $dataObjects)
    {
        $this->data []= $dataObjects;
    }

    public function deathReasonCounter(): array
    {
        $data = [];
        foreach ($this->data as $value) {
            $data[] = $value->getDeathReason();
        }
        return array_count_values($data);
    }

    public function nonViolentCounter(): array
    {
        $data = [];
        foreach ($this->data as $value) {
            $data[] = $value->getnonViolentDeath();
        } 
        return array_count_values(array_merge(...$data));
    }

    public function violentDeathCounter(): array
    {
        $data = [];
        foreach ($this->data as $value) {
            $data[] = $value->getViolentDeath();
        }
         return array_count_values(array_merge(...$data));
    }

    public function violentDeathTypesCounter(): array
    {
        $data = [];
        foreach ($this->data as $value){
            $data[] = $value->getViolentDeathType();
        }
        return array_count_values(array_merge(...$data));
    }
}
