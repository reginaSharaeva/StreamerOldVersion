<?php

use Symfony\Component\HttpFoundation\Request;

require __DIR__.'/../vendor/autoload.php';
if (PHP_VERSION_ID < 70000) {
    include_once __DIR__.'/../var/bootstrap.php.cache';
}

$kernel = new AppKernel('prod', false);
if (PHP_VERSION_ID < 70000) {
    $kernel->loadClassCache();
}
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);




// https://kpfu.ru/student_diplom/10.160.178.20_5720874_F_Grishina_A.S._303.pdf
// https://en.wikipedia.org/wiki/Distributed_file_system_for_cloud
// http://www.chinacloud.cn/upload/2012-05/12051808088529.pdf
// https://www.hse.ru/pubs/share/direct/document/164838318
// https://eniac2017.files.wordpress.com/2017/03/distributed-and-cloud-computing.pdf
// http://elbib.elpub.ru/jour/article/view/15
