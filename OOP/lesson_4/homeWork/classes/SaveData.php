<?php

class SaveData
{

    public $fp;
    public $file = 'data.txt';

    public function __construct($file)
    {
        $this->file = $file;
            if (!is_writable($this->file)){
                echo "Файл {$this->file} не доступен для записи!";
            exit;
            }
        $this->fp = fopen($this->file,'a');

    }
    public function __destruct()
    {
        fclose($this->fp);
    }

    public function write($data)
    {
        if(fwrite($this->fp,$data . PHP_EOL)===FALSE) {
            echo "не моу произвести запись в файл {$this->file}!";
            exit;
        }
    }
}