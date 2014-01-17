<?php

namespace Flow;

use Flow\Graph;
use Flow\Builder\SourceNode;
use Flow\Builder\TargetNode;
use Flow\Edge;

class EdgeBuilder
{
	private $graph;
	private $sourceNode;
	private $targetNode;
	
	public function __construct(Graph $graph)
	{
		$this->graph = $graph;
	}
	
	public function getGraph()
	{
		return $this->graph;
	}

	public function fromNode($process)
	{
		$this->sourceNode = new SourceNode($this, $process);
		return $this->sourceNode;
	}
	
	public function toNode($process)
	{
		$this->targetNode = new TargetNode($this, $process);
		return $this->targetNode;
	}
	
	public function build()
	{
		return new Edge(
			$this->sourceNode->getProcess(), 
			$this->sourceNode->getPort(), 
			$this->targetNode->getProcess(),
			$this->targetNode->getPort()
		);
	}
}