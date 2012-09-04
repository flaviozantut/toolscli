<?php


/*
|--------------------------------------------------------------------------
| Admin Models
|--------------------------------------------------------------------------
|
| Map Models  using PSR-0 standard namespace. 
 */
Autoloader::directories(array(
    Bundle::path('toolscli').'libraries',
));



Autoloader::map(array(
    'CssMin' => Bundle::path('toolscli').'libraries/cssmin/cssmin.php'
    
));

?>