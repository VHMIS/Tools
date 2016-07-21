<?php

define('PHPEXCEL_ROOT', '/WebServer/PHPExcel/Classes/');
include PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

$objReader = \PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load('dm.xls');
$objPHPExcel->setActiveSheetIndex(0);

$data = [];
for ($i = 2; $i <= 3702; $i++) {
    $pro = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();
    $dis = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getValue();
    $dis_name = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getValue();
    
    $data[$pro][$dis] = ['name' => $dis_name];
}

$objPHPExcel->setActiveSheetIndex(1);

for ($i = 4; $i <= 5641; $i++) {
    $pro = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue();
    $dis = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getValue();
    $war = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getValue();
    $war_name = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getValue();
    
    $data[$pro][$dis]['ward'][$war] = $war_name;
}

foreach ($data as $pro => $data1) {
    foreach ($data1 as $dis => $data2) {
        $data[$pro][$dis]['ward']['00'] = 'Xã phường không có trong danh sách';
    }
}

foreach($data as $id => $content) {
    file_put_contents('fa_' . $id . '.json', json_encode($content));
}


/*
<?php

define('PHPEXCEL_ROOT', '/WebServer/PHPExcel/Classes/');
include PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

$objReader = \PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load('dm_c.xls');
$objPHPExcel->setActiveSheetIndex(0);

$data = [];
for ($i = 2; $i <= 531; $i++) {
    $code = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue();
    $name = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();
    
    $data[$code] = $name;
}

file_put_contents('college.json', json_encode($data));
*/
