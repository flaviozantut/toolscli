<?php 
/**
* 
*/
class TollscliLess
{
	
	

	public function exec($args = false)
	{
		
		return $this->compile($args);
	}

	public function compile($min = false)
	{
		require "lessphp/lessc.inc.php";
		$less = new lessc;
		foreach ($this->getFiles('less') as $file) {
			echo "load file: {$file}\n";
			$css =  $less->compileFile($file);
			if($css) {
				echo "save file: " . preg_replace('/\.less$/', '.css', $file) . "\n";
				if($min) {
					File::put(preg_replace('/\.less$/', '.css', $file), CssMin::minify($css));
				} else {
					File::put(preg_replace('/\.less$/', '.css', $file), $css);
				}
					
			}
		}
		return true;
	}
	public function getFiles($type)
	{
		$files = array();
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(path('public')),
                                              RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($iterator as $path) {
      		if ($path->isFile()) {
      			if(File::extension($path->__toString()) == $type) {
	      			$files[] =  $path->__toString();
	      		}
	      	}
    	}
    	return $files;
	}


}
