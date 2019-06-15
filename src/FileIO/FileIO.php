<?php

namespace FileIO;

class FileIO
{
	const NEWLINE = "\n";
	const MODE_READ = "r";
	const MODE_WRITE = "w";
	const MODE_APPEND = "a";
	private $filename;
	protected $handle;
	private $mode;
	
	public function __construct($filename, $mode = null)
	{
		$this->filename = $filename;
		$this->handle = null;
		$this->mode = self::MODE_READ;
		if ($mode !== null) {
			$this->mode = $mode;
		}
	}
	
	public function open()
	{
		try {
			$this->handle = fopen($this->filename, $this->mode);
		} catch (Exception $e) {
			$this->handle = null;
		}
	}
	
	public function close()
	{
		fclose($this->handle);
		$this->handle = null;
	}
	
	public function exists()
	{
		$check = true;
		$this->open();
		if ($this->handle == null) {
			$check = false;
		} else {
			$this->close();
		} 
		return $check;
	}
}
