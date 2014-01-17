<?php

namespace Flow;

abstract class Component implements ComponentInterface
{
    public $inPorts = [];
    public $outPorts = [];
    protected $description = "";

    public function getDescription()
    {
        return $this->description;
    }
}