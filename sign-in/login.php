<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/check_auth.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/dbconfig.php');
//
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found', TRUE, 404);
    die(header('location: /sciweb/'));
}
//
if (!isset($_POST['inputUser'])) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'error';
    $result['msg'] = 'Parâmetro(s) não informado(s).';
    die(json_encode($result));
}
//
if (!isset($_POST['inputPassword'])) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'error';
    $result['msg'] = 'Parâmetro(s) não informado(s).';
    die(json_encode($result));
}
//
$returnURL = "/sciweb/";
if (isset($_POST['returnURL'])) {
    $returnURL = $_POST['returnURL'];
}
$inputUser = $_POST['inputUser'];
$inputPassword = $_POST['inputPassword'];
//
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password";
try{
    // create a PostgreSQL database connection
    $conn = new PDO($dsn);
    //
    $sql = "SELECT username,password FROM public.webuser " .
    "WHERE username='${inputUser}' AND password='" . MD5($inputPassword) . "';";
    //
    $stmt = $conn->query($sql);
    if($stmt === false) {
        throw new Exception('Erro acessando o Banco de Dados.');
    } 
    //
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt === false) {
        throw new Exception('Acesso negado: Usuário não cadastrado.');
    } 
    //
    if (($inputUser == $row['username']) && (MD5($inputPassword) == $row['password'])) {
        $_SESSION['USERNAME']  = $inputUser;
        $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];;
        exit('Ok');
    } else {
        throw new Exception('Acesso negado: Usuário não cadastrado.');
    }
    //
} catch (PDOException | Exception $e) {
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 Bad Request', TRUE, 400);
    header('Content-type: application/json');
    $result['status'] = 'Error';
    $result['msg'] = $e->getMessage();
    die(json_encode($result));
}
