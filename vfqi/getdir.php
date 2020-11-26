<?php

/*
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found', TRUE, 404);
    die(header('location: index.html'));
}
*/


$request = $_POST['request'];

if($request == 'dir') {
    list_dir();
}
if($request == 'files') {
    if (empty($_POST['pdir'])) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
        header('Content-type: application/json');
        $result['status'] = 'error';
        $result['msg'] = 'Parâmetro(s) não informado(s).';
        die(json_encode($result));
    }
    //
    $pdir = $_POST['pdir'];
    list_files($pdir);
}


function list_dir()
{
    // $path_pattern = "~/datadrive/fquadra_img/(.*)~";
    $dirs = glob("/datadrive/fquadra_img/*", GLOB_ONLYDIR);
    // foreach ($dirs as $dirname) {
    //     $onlydir = str_replace('/datadrive/fquadra_img/', '', $dirname);
    //     echo $onlydir . "\n";
    // };
    //
    $dirs = str_replace('/datadrive/fquadra_img/', '', $dirs);
    echo json_encode($dirs);
}

function list_files($dirname)
{
    //$dirname_escaped = str_replace(' ', '\ ', $dirname);
    $dirname_escaped = $dirname;

    if (PHP_OS_FAMILY == 'Windows') {
        $mypath = '/datadrive/fquadra_img/' . $dirname . '/*.jpg';
    }
    else {
        $mypath = '/datadrive/fquadra_img/' . $dirname_escaped . '/*.jpg';
    }
    $files = glob($mypath);
    // foreach ($files as $filename) {
    //     echo $filename . "\n";
    // }
    //
    $mypath = str_replace('*.jpg', '', $mypath);
    $files = str_replace($mypath, '', $files);
    $files = str_replace('.jpg', '', $files);
    echo json_encode($files);
}

//list_dir();
//$dirname = 'd1 z14 aeroporto funcionarios alex paiva';
//list_files($dirname);
