<?php

namespace FileIO;

class FileIOReader extends FileIO
{

	public function __construct($filename)
	{
		parent::__construct($filename, self::MODE_READ);
	}
	
	public function read()
	{
		$temp = self::readLines();
		$str = implode(self::NEWLINE, $temp);
		return $str;
	}
		
	public function readLines()
	{
		$lines = array();
		$this->open();
		while ($line = fgets($this->handle)) {
			$lines[] = rtrim($line);
		}
		$this->close();
		return $lines;
	}
}

