<?php 
/**
* 
*/
class TollscliCoffee
{
    
    

    public function exec($args = false)
    {
        return $this->compile($args);
    }

    public function compile($min = false)
    {
        foreach ($this->getFiles('coffee') as $file) {
            echo "load file: {$file}\n";
            try {
              $coffee = file_get_contents($file);

              // See available options above.
              $js = CoffeeScript\Compiler::compile($coffee, array('filename' => $file));
              if($js) {
                    echo "save file: " . preg_replace('/\.coffee$/', '.js', $file) . "\n";
                    File::put(preg_replace('/\.coffee$/', '.js', $file), $js);
                    /*if($min) {
                        File::put(preg_replace('/\.less$/', '.css', $file), CssMin::minify($css));
                    } else {
                        File::put(preg_replace('/\.less$/', '.css', $file), $css);
                    }*/ 
                }
            } catch (Exception $e) {
              echo $e->getMessage();
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
