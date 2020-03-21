<?php

class WritingToFile
{
    public $fp;
    public $file = 'data.txt';
    public $separation = "\r\n". '***************'. "\r\n";

    public  function __construct($file)
    {
        $this->file = $file;
         if(!is_writable($this->file)){
             echo "Не удалось открыть файл {$this->file} !";
             exit;
        }

        $this->fp = fopen($this->file , 'a');


    }

    public function __destruct()
    {
        $this->fp = fclose($this->fp);
    }
    
    public function write($data)
    {
        $this->separation = $separation;

        if (fwrite($this->fp,$data . PHP_EOL)===FALSE){
            echo "В файл {$this->file} невозможно сделать запись!";
            exit;
        }
    }

}