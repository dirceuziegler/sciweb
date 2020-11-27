<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/sign-in/check_auth.php');

$returnURL = '/sciweb/';
if (isset($_GET['returnURL'])) {
    $returnURL = $_GET['returnURL'];
}

if (isset($_GET['request'])) {
    $request = $_GET['request'];
    if ($request == 'logout') {
        session_destroy();
        die(header('location: /sciweb/'));
    }
}

if (isset($_SESSION['username'])) {
    die(header('location: ' . $returnURL));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-family: Roboto;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" />
    <link href="../img/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">
</head>

<body class="text-center">
    <!-- <form id="f_login" class="form-signin" action="login.php" method="POST" > -->
    <form id="f_login" class="form-signin">
        <img class="mb-4" src="../img/logotipo.png" alt="" />
        <h1 class="h3 mb-3 font-weight-normal">Informe seus dados</h1>
        <label for="inputUser" class="sr-only">Usuário</label>
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuário" required autofocus />
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required />
        <input type="hidden" name="returnURL" value="<?= $returnURL ?>" />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer login</button>
    </form>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">SCIWeb - Erro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p id="error"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js" integrity="sha512-7yA/d79yIhHPvcrSiB8S/7TyX0OxlccU8F/kuB8mHYjLlF1MInPbEohpoqfz0AILoq5hoD7lELZAYYHbyeEjag==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $("#f_login").on("submit", function(event) {
                event.preventDefault();
                //console.log($(this).serialize());
                //
                $.ajax({
                        url: '/sciweb/sign-in/login.php',
                        type: 'POST',
                        data: $(this).serialize(),
                        datatype: 'text'
                    })
                    .done(function(data) {
                        //console.log('success:' + data);
                        // console.log('returnurl:' + <?= $returnURL ?>);
                        <?php
                        echo "window.location.href = '${returnURL}';"
                        ?>
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        //s = status + ' ' + errorThrown + '<br>' + jqXHR.responseJSON.msg;
                        // alert(s);
                        $("#error").html(jqXHR.responseJSON.msg);
                        $('#myModal').modal("show");
                    });
            });

        });
    </script>

</body>

</html>