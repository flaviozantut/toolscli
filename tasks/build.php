<?php
class Toolscli_Build_Task extends Task {

    public function run($args)
    {
    	
    	try {
	     	$class = "Tollscli" . ucfirst($args[0]);
	     	$run = new $class();
	     	if (isset($args[1]) and $args[1] == '-c') {
	     		$run->exec(true);
	     	} else {
	     		$run->exec();
	     	}
	     	

	    	
	    } catch (Exception $e) {
  			echo $e->getMessage() . "\n";
		}	
    }

}