<?php

use Otaodev\Orcamentos\Welcome;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Welcome.php';

$hello = new Welcome();

echo $hello->sayHello();