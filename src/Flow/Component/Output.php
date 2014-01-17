<?php
namespace Flow\Component;

use Flow\Component;
use Flow\ArrayPort;

class Output extends Component
{
    public function __construct()
    {
        $this->inPorts['in'] = new ArrayPort();
        $this->inPorts['in']->on('data', [$this, 'displayData']);
    }

    public function displayData($data)
    {
        echo "{$data}\n";
    }
}