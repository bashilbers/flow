<?php
namespace Flow\Component;

use Flow\Component;
use Flow\Port;

class ReadFile extends Component
{
    public function __construct()
    {
        $this->inPorts['source'] = new Port();
        $this->outPorts['out'] = new Port();
        $this->outPorts['error'] = new Port();

        $this->inPorts['source']->on('data', [$this, 'readFile']);
    }

    public function readFile($data)
    {
        if (!file_exists($data)) {
            $this->outPorts['error']->send("File {$data} doesn't exist");

            return;
        }

        $this->outPorts['out']->send(file_get_contents($data));
        $this->outPorts['out']->disconnect();
    }
}