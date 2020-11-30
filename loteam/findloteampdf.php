<?php
require($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/vertime.php');
//
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found', TRUE, 404);
    die(header('location: index.html'));
}
//
list_loteam_pdf();

#------------------------------------------------------------------------------
#   list_loteam_pdf
#------------------------------------------------------------------------------
function list_loteam_pdf()
{
    $mypath = '/datadrive/loteamentos_pdf/*.pdf';
    $files = glob($mypath);
    $mypath = str_replace('*.pdf', '', $mypath);
    $files = str_replace($mypath, '', $files);
    $files = str_replace('.pdf', '', $files);
    echo json_encode($files);
}
