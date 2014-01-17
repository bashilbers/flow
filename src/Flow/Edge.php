<?php

namespace Flow;


class Edge
{
	private $sourceProcess;
	private $sourcePort;
	private $targetProcess;
	private $targetPort;
	
	public function __construct($srcProc, $srcPort, $tgtProc, $tgtPort)
	{
		$this->sourceProcess = $srcProc;
		$this->sourcePort = $srcPort;
		$this->targetProcess = $tgtProc;
		$this->targetPort = $tgtPort;
	}
	
	public function toArray()
	{
		return [
			'source' => [
				'process' => $this->sourceProcess,
				'port' => $this->sourcePort
			],
			'target' => [
				'process' => $this->targetProcess,
				'port' => $this->targetPort
			]
		];
	}
}