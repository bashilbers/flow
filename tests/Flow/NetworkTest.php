<?php
namespace Flow\Tests;

use Flow\Network;
use Flow\Graph;

class NetworkTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadFile()
    {
        $network = Network::fromGraph(Graph::fromFile(__DIR__ . '/../count.graph.json'));
        
        var_dump($network);
        die(__FILE__);
        
        //$readFile = $graph->getNode('ReadFile');
        //$this->assertEquals('ReadFile', $readFile['id']);

        //$this->assertEquals(4, count($graph->nodes));
    }
}