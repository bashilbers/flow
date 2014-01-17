<?php

namespace Flow\Builder;

class SourceNode extends PrototypeNode
{	
	private $port;

	public function on($portName)
	{
		$class = $this->getBuilder()->getGraph()->getNode($this->getProcess())['component'];
		$component = new $class;
		
		if (!isset($component->outPorts[$portName])) {
            throw new \InvalidArgumentException("No outport {$portName} defined for process {$this->getProcess()}");
        }
        
        $this->port = $portName;	
		return $this;
	}
	
	public function getPort()
	{
		return $this->port;
	}
		
	public function toNode($process)
	{
		return $this->getBuilder()->toNode($process);
	}	
}