<?php

//upload.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Spreadsheet;

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {
    
    public function __construct() {
        $this->cols = range('A','F');
    }

    public function readCell($column, $row, $worksheetName = '') {
        if (in_array($column, $this->cols)) {
            return true;
        }
        return false;
    }
}


$inputFileName = $_FILES['select_excel']['tmp_name'];

if ($inputFileName == '') {
    $message = '<div class="alert alert-danger">Please Select File</div>';
    echo $message;
    exit();
}

$inputFileType = IOFactory::identify($inputFileName);
$allowed_extension = array('Xls', 'Xlsx', 'Ods');
if (!in_array($inputFileType, $allowed_extension)) {
    $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
    echo $message;
    exit();
}

$reader = IOFactory::createReader($inputFileType);
$reader->setReadFilter( new MyReadFilter() );
//$worksheetNames = $reader->listWorksheetNames($inputFileName);
//$reader->setLoadSheetsOnly('MUDANÇA DE QUADRAS');
$spreadsheet = $reader->load($inputFileName);

$sheetCount = $spreadsheet->getSheetCount();
$sheetNames = $spreadsheet->getSheetNames();

$writer = IOFactory::createWriter($spreadsheet, 'Html');
$writer->setSheetIndex(0);
//$message = $writer->save('php://output');

// $h = $writer->generateHTMLHeader();
// $s = $writer->generateStyles();
// $d = $writer->generateSheetData();
// $f = $writer->generateHTMLFooter();

$message_0 = $writer->generateHTMLAll();

$obj1 = new stdClass();
$obj1->name = $sheetNames[0];
$obj1->html = $message_0;
$myArr = array($obj1);


if ($sheetCount > 1) {
    $writer->setSheetIndex(1);
    $message_1 = $writer->generateHTMLAll();

    $obj2 = new stdClass();
    $obj2->name = $sheetNames[1];
    $obj2->html = $message_1;
    array_push($myArr, $obj2);
}

// if($_FILES["select_excel"]["name"] != '') {
//     $allowed_extension = array('xls', 'xlsx');
//     $file_array = explode(".", $_FILES['select_excel']['name']);
//     $file_extension = end($file_array);
//     if(in_array($file_extension, $allowed_extension)) {
//         $reader = IOFactory::createReader('Xls');
//         $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
//         //$spreadsheet = IOFactory::load($_FILES['select_excel']['tmp_name']);    
//         $spreadsheet->getSheet(1);
//         $writer = IOFactory::createWriter($spreadsheet, 'Html');
//         $message = $writer->save('php://output');
//     } else {
//         $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
//     }
// } else {
//     $message = '<div class="alert alert-danger">Please Select File</div>';
// }


// $myArr = array($message_0, $message_1);
$myJSON = json_encode($myArr);
echo $myJSON;

//echo $message_0;
