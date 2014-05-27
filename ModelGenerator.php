<?php

// Config
$framework = 'path/to/framework';
$dbConfig = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '123',
    'auto' => true
);
$modelNamespace = 'VhmisSystem\Apps\Hr\Model';
$dir = '/WebServer/DbCreate/';
$datebase = 'viethanit_hrm';
$tablePrefix = 'hrm_';

// Require
require $framework . 'Vhmis/Db/AdapterInterface.php';
require $framework . 'Vhmis/Db/ModelInterface.php';
require $framework . 'Vhmis/Db/MySQL/Adapter.php';
require $framework . 'Vhmis/Db/MySQL/Statement.php';
require $framework . 'Vhmis/Db/MySQL/Result.php';
require $framework . 'Vhmis/Db/MySQL/Model.php';
require $framework . 'Vhmis/Db/MySQL/Entity.php';
require $framework . 'Vhmis/Db/MySQL/BuildModel.php';

use \Vhmis\Db\MySQL as Db;

$build = new Db\BuildModel($dbConfig, $modelNamespace, $dir, $tablePrefix);

$build->build($datebase);
