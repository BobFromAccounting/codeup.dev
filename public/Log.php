<?php
class Log
{
    public $filename;
    public $handle;

    public function __construct ($prefix = 'log')
    {
        $this->filename = "log/{$prefix}-" . date('Y-m-d') . '.log';
        $this->handle = fopen($this->filename, 'a');
    }

    public function logMessage ($logLevel, $message)
    {
        $logSpecificTime =  date("Y-m-d H:i:s");
        $stringToWrite =  "{$logSpecificTime} [{$logLevel}] {$message}";
        fwrite($this->handle, PHP_EOL . $stringToWrite);
    }

    public function logInfo ($message)
    {
        return $this->logMessage('INFO', $message);
    }

    public function logError ($message)
    {
        return $this->logMessage('ERROR', $message);
    }

    public function logWarning ($message)
    {
        return $this->logMessage('WARNING', $message);
    }

    public function __destruct ()
    {
        fclose($this->handle);
    }
}
?>