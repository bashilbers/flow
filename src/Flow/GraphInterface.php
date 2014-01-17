<?php

namespace Flow;

interface GraphInterface
{
    public function addNode($id, $component);

    public function removeNode($id);

    public function getNode($id);
    
    public function getNodes();

    public function addEdge($outNode, $outPort, $inNode, $inPort);

    public function removeEdge($node, $port);
    
    public function addInitial($data, $node, $port);
}