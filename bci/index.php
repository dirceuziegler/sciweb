<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/sign-in/check_auth.php');

// // if (!isset($_SESSION['user_id'])) {
// //   die(header('location: login.html'));
// // }
// $pagecontents = file_get_contents("NOMORE_index.html");
// //$pagecontents = file_get_contents($_SERVER['DOCUMENT_ROOT']."/path/to/file.html");
// echo $pagecontents;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>BCI</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="../img/favicon.ico" rel="icon" type="image/x-icon" />
  <link
    href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: Roboto;
    }
    .pdfv {
      position: absolute;
      width: 100vw;
      border: 0;
      background-color: #525659;
    }

    .sectop {
      background-color: aliceblue;
    }

    .logo {
      height: 60px;
      width: auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-primary py-0">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a id="link_home" class="nav-link" href="javascript:void()">
          <i class="fa fa-home"></i>
          Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
        <span class="navbar-text ml-auto py-0">
          <a id="link_login" class="nav-link" href="javascript:void()">
          <?php
            if (isset($_SESSION['username'])) {
              echo 'Logout (<i class="fa fa-user"></i> ' . $_SESSION['username'] . ') <i class="fa fa-sign-out"></i>';
            } else {
              echo 'Login <i class="fa fa-sign-in"></i>';
            }
          ?>
          </a>
        </span>
    </div>
  </nav>


  <div class="d-flex sectop">
    <div class="p-3">
      <img class="logo" src="../img/logotipo.png" />
    </div>
    <div class="p-2 pl-5">
      <h3>BCI<br><small>Boletim de Cadastro Imobiliário</small></h3>
    </div>
    <div class="ml-auto align-self-center p-2 pr-3">
      <form id="f_indcad" class="form-inline">
        <label for="indcad" class="mr-sm-2">Índice Cadastral:</label>
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="DD.ZZ.SS.QQQ.LLLL" id="indcad" name="indcad" />
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
      </form>
    </div>
  </div>

  <object id="pdfviewer" data="" type="application/pdf" class="pdfv"></object>

  <!-- Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">BCI - Erro</h4>
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js" integrity="sha512-7yA/d79yIhHPvcrSiB8S/7TyX0OxlccU8F/kuB8mHYjLlF1MInPbEohpoqfz0AILoq5hoD7lELZAYYHbyeEjag==" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {

        $("#link_login").on('click', function (e) {
          e.preventDefault();
          // window.location.href = "/sciweb/sign-in/";
          <?php
          if (isset($_SESSION['username'])) {
            echo 'window.location.href = "/sciweb/sign-in?returnURL=%2Fsciweb%2F&request=logout";';
          } else {
            echo 'window.location.href = "/sciweb/sign-in?returnURL=%2Fsciweb%2Fbci%2F";';
          }
          ?>
        });
        $("#link_home").on('click', function (e) {
          e.preventDefault();
          window.location.href = "/sciweb/";
        });
        
      $(window).on('load resize', function() {
        $window = $(window);
        $("#pdfviewer").height(function() {
          return $window.height() - $(this).offset().top;
        });
      });

      $("#f_indcad").on("submit", function(event) {
        event.preventDefault();
        // console.log($("#f_indcad").serialize());
        //
        $.ajax({
            url: 'findpdf.php',
            type: 'POST',
            data: $(this).serialize(),
            datatype: 'text'
          })
          .done(function(data) {
            document.getElementById('pdfviewer').data = data;
            // console.log('success:' + data);
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
