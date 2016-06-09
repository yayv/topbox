<?php

class kitchen
{
	private function checkDirForId($id)
	{
		$subdir = sprintf("%04d",intval($id/8000));

		$path = "data/pages/$subdir/";
		if(is_dir($path))
		{
			return $path;
		}
		else
		{
			$ret = mkdir($path, 0777);

			if($ret)
				return $path;
			else
				return false;
		}
	}

	public function loadPageContent($id)
	{
		$path = $this->checkDirForId($id);
		if($path)
		{
			// TODO: save
			$ret = file_get_contents($path.$id);
			return $ret;
		}
		else
		{
			// failed
			return false;
		}

	}

	public function savePage($id, $page)
	{
		$path = $this->checkDirForId($id);
		if($path)
		{
			// TODO: save
			$ret = file_put_contents($path.$id, $page);
			return $ret;
		}
		else
		{
			// failed
			return false;
		}
	}

}

