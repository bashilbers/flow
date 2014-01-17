<?php

$fileName = __FILE__;

// Include standard autoloader
require __DIR__ . '/../vendor/autoload.php';

// Add nodes to the graph
$graph = new Flow\Graph("linecount test");
$graph->addNode("Download Feed", "Flow\\Component\\DownloadFile");
$graph->addNode("Read File", "Flow\\Component\\ReadFile");
$graph->addNode("Split by Lines", "Flow\\Component\\SplitStr");
$graph->addNode("Count Lines", "Flow\\Component\\LineCount");
$graph->addNode("Display", "Flow\\Component\\Output");

// Add connections between nodes on a object oriented way
//$edgeBuilder = new Flow\EdgeBuilder($graph);
//$edge = $edgeBuilder->fromNode('Download Feed')->on('out')->toNode('Read File')->on('source')->build();

$graph->addEdge("Download Feed", "out", "Read File", "source");
$graph->addEdge("Download Feed", "error", "Display", "in");
$graph->addEdge("Read File", "out", "Split by Lines", "in");
$graph->addEdge("Read File", "error", "Display", "in");
$graph->addEdge("Split by Lines", "out", "Count Lines", "in");
$graph->addEdge("Count Lines", "count", "Display", "in");

// Kick-start the process by sending filename to Read File
$graph->addInitial('https://dl.dropboxusercontent.com/u/4626326/test.csv', "Download Feed", "source");

// Make the graph "live"
$network = Flow\Network::fromGraph($graph);