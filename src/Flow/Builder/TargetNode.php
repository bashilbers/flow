<?php

namespace Flow\Builder;

class TargetNode extends PrototypeNode
{
	private $port;

	public function on($portName)
	{
		$class = $this->getBuilder()->getGraph()->getNode($this->getProcess())['component'];
		$component = new $class;
		
		if (!isset($component->inPorts[$portName])) {
            throw new \InvalidArgumentException("No inport {$portName} defined for process {$this->getProcess()}");
        }
        
        $this->port = $portName;	
		return $this;
	}
	
	public function getPort()
	{
		return $this->port;
	}
}