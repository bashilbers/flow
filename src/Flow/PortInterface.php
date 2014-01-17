<?php

namespace Flow;

interface PortInterface
{
    public function attach(SocketInterface $socket);

    public function detach(SocketInterface $socket);

    public function send($data);

    public function connect();

    public function disconnect();

    public function isConnected();
}
