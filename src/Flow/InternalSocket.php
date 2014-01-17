<?php

namespace Flow;

use Evenement\EventEmitterTrait;

class InternalSocket implements SocketInterface
{
	use EventEmitterTrait;

    private $connected = false;
    public $from = [];
    public $to = [];

    public function getId()
    {
        if ($this->from && !$this->to) {
            return "{$this->from['process']['id']}.{$this->from['port']}:ANON";
        }
        if (!$this->from) {
            return "ANON:{$this->to['process']['id']}.{$this->to['port']}";
        }

        return "{$this->from['process']['id']}.{$this->from['port']}:{$this->to['process']['id']}.{$this->to['port']}";
    }

    public function connect()
    {
        $this->connected = true;
        $this->emit('connect', [$this]);
    }

    public function send($data)
    {
        $this->emit('data', [$data]);
    }

    public function disconnect()
    {
        $this->connected = false;
        $this->emit('disconnect', [$this]);
    }

    public function isConnected()
    {
        return $this->connected;
    }
}
