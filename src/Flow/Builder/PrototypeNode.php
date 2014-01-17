<?php

namespace Flow\Builder;

use Flow\EdgeBuilder;

abstract class PrototypeNode
{
	private $builder;
	private $process;
	
	public function __construct(EdgeBuilder $builder, $process)
	{
		$this->builder = $builder;
		$this->process = $process;
	}
	
	public function getBuilder()
	{
		return $this->builder;
	}
	
	public function getProcess()
	{
		return $this->process;
	}
	
	final function build()
	{
		return $this->getBuilder()->build();
	}
	
	abstract function on($portname);
}