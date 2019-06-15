<?php

namespace FileIO;

class FileIOWriter extends FileIO
{
	
	public function __construct($filename)
	{
		parent::__construct($filename, self::MODE_WRITE);
	}
	
	public function write($content)
	{
		$this->open();
		fwrite($this->handle, $content);
		$this->close();
	}
	
	public function writeLines($lines)
	{
		$this->open();
		foreach ($lines as $line) {
			fwrite($this->handle, $line . self::NEWLINE);
		}
		$this->close;
	}	
}