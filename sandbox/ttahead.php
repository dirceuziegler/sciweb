<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/dbconfig.php');
//
if (!isset($_REQUEST['query'])) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'error';
    $result['msg'] = 'Parâmetro(s) não informado(s).';
    die(json_encode($result));
}
//
$query = strtoupper($_REQUEST['query']);
//
$res = [];
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";
try{
    // create a PostgreSQL database connection
    $conn = new PDO($dsn);
    //
    $n = strlen($query);
    switch ($n) {
        case 0:
            throw new Exception('Query parameter error.');
            break;
        case 1:
        case 2:
            $sql = "SELECT comp FROM public.logradouro WHERE logradouro = '{$query}';";
            break;
        case 3:
            $sql = "SELECT comp FROM public.logradouro WHERE logradouro LIKE '{$query}%';";
            break;
        default:
            $sql = "SELECT comp FROM public.logradouro WHERE logradouro LIKE '%{$query}%';";
            break;
    }
    //
    $stmt = $conn->query($sql);
    if($stmt === false) {
        throw new Exception('Erro acessando o Banco de Dados.');
    } 
    //
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $row['comp'];
    }
    //
} catch (PDOException | Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'Error';
    $result['msg'] = $e->getMessage();
    die(json_encode($result));
}
//
echo json_encode($res);
