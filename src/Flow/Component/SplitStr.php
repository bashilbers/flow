<?php
namespace Flow\Component;

use Flow\Component;
use Flow\Port;

class SplitStr extends Component
{
    private $delimiterString = "\n";
    private $string = "";

    public function __construct()
    {
        $this->inPorts['in'] = new Port();
        $this->inPorts['delimiter'] = new Port();
        $this->outPorts['out'] = new Port();

        $this->inPorts['delimiter']->on('data', [$this, 'setDelimiter']);
        $this->inPorts['in']->on('data', [$this, 'appendString']);
        $this->inPorts['in']->on('disconnect', [$this, 'splitString']);
    }

    public function setDelimiter($data)
    {
        $this->delimiterString = $data;
    }

    public function appendString($data)
    {
        $this->string .= $data;
    }

    public function splitString()
    {
        $parts = explode($this->delimiterString, $this->string);
        foreach ($parts as $part) {
            $this->outPorts['out']->send($part);
        }
        $this->outPorts['out']->disconnect();
        $this->string = "";
    }
}
