<?php
declare (strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

$c = json_decode(file_get_contents( __DIR__ . "/../conf/config.json"));
$pdo = new PDO(...$c->{"Db"});

$jsons = array();
$storage = array();
foreach ([""] as $item) {
    $jsons[$item] = json_decode(file_get_contents(__DIR__ . "/../src/$item/component.json"));
    $class = '\\'."Jenny".'\\'.ucfirst($item).'\\'."Model";
    $storage[$item]  = new $class($pdo, $jsons[$item]);
}
$logger = new \Genelet\Logger($c->{"Log"}->{"Filename"}, $c->{"Log"}->{"Level"});
$controller = new \Genelet\Controller($c, $pdo, $jsons, $storage, $logger);
$resp = $controller->Run();

if ($resp->code !== 200 || $resp->is_json) {
    echo $resp->report();
} else {
    $loader = ($resp->page_type=="error" || $resp->page_type=="login") ?
    new \Twig\Loader\FilesystemLoader( $c->{"Template"}."/".$resp->role) :
    new \Twig\Loader\FilesystemLoader([$c->{"Template"}."/".$resp->role, $c->{"Template"}."/".$resp->role ."/". $resp->component]);
    $twig = new \Twig\Environment($loader);
    echo $resp->report(Array($twig, "render"));
}

?>
