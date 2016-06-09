<?php

class semaphore
{
	private $_usable = false;
	private $_key    = '';
	private $_count  = 1;

	public function __construct($name)
	{
		if(function_exists("sem_get"))
		{
			$this->_usable = true;
		}
	}

	public function setSemaCount($count)
	{
		$this->_count = $count;
	}

	public function isUsable()
	{
		return $this->_usable;
	}

	public function get($name)
	{
		$this->_key = ftok($name, "56pai.com");
		$res = sem_get($this->_key, $this->_count);
		return $res;
	}

	public function run()
	{
		$ret = sem_acquire($this->_key);

		return $ret;
	}

	public function release()
	{
		sem_release($this->_key);
		sem_remove($this->_key);
	}
}
