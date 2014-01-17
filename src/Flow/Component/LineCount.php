<?php
namespace Flow\Component;

use Flow\Component;
use Flow\Port;

class LineCount extends Component
{
    private $count;

    public function __construct()
    {
        $this->inPorts['in'] = new Port();
        $this->outPorts['count'] = new Port();

        $this->inPorts['in']->on('data', [$this, 'appendCount']);
        $this->inPorts['in']->on('disconnect', [$this, 'sendCount']);
    }

    public function appendCount($data)
    {
        if (is_null($this->count)) {
            $this->count = 0;
        }
        $this->count++;
    }

    public function sendCount()
    {
        $this->outPorts['count']->send($this->count);
        $this->outPorts['count']->disconnect();
        $this->count = null;
    }
}