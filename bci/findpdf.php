<?php

$indcad = '';
$pdfpath = '';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found', TRUE, 404);
    die(header('location: index.html'));
}
#
if (empty($_POST['indcad'])) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'error';
    $result['msg'] = 'Parâmetro(s) não informado(s).';
    die(json_encode($result));
}
#    
$indcad = $_POST['indcad'];
#
list($rc, $msg) = get_pdf_path($indcad, $pdfpath);
if (!$rc) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'error';
    $result['msg'] = $msg;
    die(json_encode($result));
}
#
echo $pdfpath;

#------------------------------------------------------------------------------
#   get_pdf_path
#------------------------------------------------------------------------------
function get_pdf_path($indcad, &$pdfpath)
{
    try {

        // $pattern = "/(\d{2})\.*(\d{2})\.*(\d{2})\.*(\d{3})\.*(\d{4})/";
        // $rc = preg_match($pattern, $indcad, $matches);
        // if ($rc != 1) {
        //     throw new Exception("Padrão inválido informado para o Índice Cadastral.");
        // }
        // $distrito = $matches[1];
        // $zona = $matches[2];
        // $setor = $matches[3];
        // $quadra = $matches[4];
        // $lote = $matches[5];
        //

        $pattern = "/(?<distrito>\d{2})\.*(?<zona>\d{2})\.*(?<setor>\d{2})\.*(?<quadra>\d{3})\.*(?<lote>\d{4})/";
        $rc = preg_match($pattern, $indcad, $m);
        if ($rc != 1) {
            throw new Exception("Padrão inválido informado para o Índice Cadastral.");
        }
        //
        $fspec = sprintf(
            "%s.%s.%s.%s.%s.pdf",
            $m['distrito'],
            $m['zona'],
            $m['setor'],
            $m['quadra'],
            $m['lote']
        );

        $fpath = sprintf(
            "/datadrive/bci/d%s/z%s/s%s/q%s/%s",
            $m['distrito'],
            $m['zona'],
            $m['setor'],
            $m['quadra'],
            $fspec
        );

        if (file_exists($fpath)) {
            $pdfpath = sprintf(
                "/bcidocs/d%s/z%s/s%s/q%s/%s",
                $m['distrito'],
                $m['zona'],
                $m['setor'],
                $m['quadra'],
                $fspec
            );
    
        } else {
            throw new Exception("Arquivo informado não pode ser encontrado.");
        }

    } catch (Exception $e) {
        return array(FALSE, $e->getMessage());
    }
    #
    return array(TRUE, "");
}
