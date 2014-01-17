<?php
namespace Flow\Component;

use Flow\Component;
use Flow\Port;

class DownloadFile extends Component
{
    public function __construct()
    {
        $this->inPorts['source'] = new Port();
        $this->outPorts['out'] = new Port();
        $this->outPorts['error'] = new Port();

        $this->inPorts['source']->on('data', [$this, 'downloadFile']);
    }

    public function downloadFile($url)
    {
        $file_name = tempnam(sys_get_temp_dir(), 'temp-file');
        $tempFile = new \SplFileObject($file_name, 'a+');
        $tempFile->fwrite(file_get_contents($url, false));

        $this->outPorts['out']->send($tempFile->getRealPath());
        $this->outPorts['out']->disconnect();
    }
}