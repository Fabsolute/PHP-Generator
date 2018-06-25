<?php

include "../vendor/autoload.php";

$root_namespace = new \Fabstract\PHPGenerator\PHPNamespace();
$root_namespace->name = 'Root';

$namespace_1 = new \Fabstract\PHPGenerator\PHPNamespace();
$namespace_1->name = 'NSP';

$namespace_2 = new \Fabstract\PHPGenerator\PHPNamespace();
$namespace_2->name = 'HAK';

$root_namespace->child_namespace_list[] = $namespace_1;
$namespace_1->parent_namespace = $root_namespace;

$namespace_2->parent_namespace = $namespace_1;
$namespace_1->child_namespace_list[] = $namespace_2;

$root_namespace->write('generated');
