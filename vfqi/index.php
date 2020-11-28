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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Plantas de Quadra (Imagem)</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link href="css/viewer.min.css" rel="stylesheet" /> -->
    <link href="../img/favicon.ico" rel="icon" type="image/x-icon" />
    <link
      href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap"
      rel="stylesheet"
    />
    <style>
   
      #spotlight .arrow,
      #spotlight .footer,
      #spotlight .header,
      #spotlight .preloader,
      #spotlight .progress {
        filter: invert(1) !important;
      }

      #spotlight {
        color: #d2d3d4 !important;
        background-color: #fff !important;
        font-family: Helvetica, Arial, sans-serif !important;
      }

      body {
          font-family: Roboto;
      }
      .logo {
        height: 60px;
        width: auto;
      }
      .sectop {
        background-color: aliceblue;
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
      <div class="p-2 pl-5 align-self-center">
        <h3>Plantas de Quadra (Imagens)</h3>
      </div>
      <div class="ml-auto align-self-center p-2 pr-4">
        <form id="fqi" class="form-inline">
          <select id="bairro" class="custom-select custom-select-sm mx-2">
            <option selected>Distrito / Zona / Bairro</option>
          </select>
          <select id="quadra" class="custom-select custom-select-sm mx-2">
            <option selected>Quadra</option>
          </select>
          <!-- <button type="submit" class="btn btn-primary btn-sm mx-2">
            Buscar
          </button> -->
        </form>
      </div>
    </div>

    <div
      id="imgctr"
      class="d-flex justify-content-center spotlight-group"
      data-theme="false"
      data-player="false"
      data-page="false"
      data-fullscreen="false"
      data-autohide="false"
    >
      <a
        id="imgitem"
        class="spotlight h-100"
        href=""
      >
        <img
          id="imgviewer"
          class="h-100"
          src=""
          alt=""
        />
      </a>
    </div>

    <!-- href="/fqi/d1%20z2%20conj%20hab%20bernado%20valadares/Q1.jpg"
    src="/fqi/d1%20z2%20conj%20hab%20bernado%20valadares/Q1.jpg" -->

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Plantas de Quadra - Erro</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="error"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Ok
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
      integrity="sha512-7yA/d79yIhHPvcrSiB8S/7TyX0OxlccU8F/kuB8mHYjLlF1MInPbEohpoqfz0AILoq5hoD7lELZAYYHbyeEjag=="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>

    <!-- <script src="js/viewer.min.js"></script>
    <script src="js/jquery-viewer.min.js"></script> -->
    <!--  -->

    <script src="js/spotlight.bundle.js"></script>
    
    <script>
      $(document).ready(function () {
      
        $("#link_login").on('click', function (e) {
          e.preventDefault();
          //window.location.href = "/sciweb/sign-in/";
          <?php
          if (isset($_SESSION['username'])) {
            echo 'window.location.href = "/sciweb/sign-in?returnURL=%2Fsciweb%2F&request=logout";';
          } else {
            echo 'window.location.href = "/sciweb/sign-in?returnURL=%2Fsciweb%2Fvfqi%2F";';
          }
          ?>
        });
        $("#link_home").on('click', function (e) {
          e.preventDefault();
          window.location.href = "/sciweb/";
        });

        $(window).on("load resize", function () {
          $window = $(window);
          $("#imgctr").height(function () {
            return $window.height() - $(this).offset().top;
          });
          $("#imgitem").height(function () {
            return $window.height() - $(this).offset().top;
          });
          $("#imgviewer").height(function () {
            return $window.height() - $(this).offset().top;
          });
        });

        //
        //  init bairros
        //
        $.ajax({
          url: "getdir.php",
          type: "POST",
          data: { request: "dir" },
          datatype: "JSON",
        })
          .done(function (data) {
            // console.log("success:" + data);
            let obj = $.parseJSON(data);
            let options = "<option selected>Distrito / Zona / Bairro</option>";
            $.each(obj, function (index, value) {
              //console.log(value);
              options += "<option>" + value + "</option>";
            });
            $("#bairro").html(options);
          })
          .fail(function (jqXHR, textStatus, errorThrown) {
            $("#error").html(jqXHR.responseJSON.msg);
            $("#myModal").modal("show");
          });

        //
        //  select bairro => init quadras
        //
        $("select#bairro").on("change", function (e) {
          // console.log(
          //   this.value,
          //   this.options[this.selectedIndex].value,
          //   $(this).find("option:selected").val()
          // );
          // console.log(this.value);
          $.ajax({
            url: "getdir.php",
            type: "POST",
            data: { 
              request: "files",
              pdir: this.value
            },
            datatype: "JSON",
          })
            .done(function (data) {
              // console.log("success:" + data);
              let obj = $.parseJSON(data);
              let options = "<option selected>Quadra</option>";
              $.each(obj, function (index, value) {
                //console.log(value);
                options += "<option>" + value + "</option>";
              });
              $("#quadra").html(options);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
              $("#error").html(jqXHR.responseJSON.msg);
              $("#myModal").modal("show");
            });
        });

        //
        //  select quadra => show JPEG
        //
        $("select#quadra").on("change", function (e) {
          // console.log($("select#bairro").find("option:selected").val());
          // console.log(this.value);

          const bairro = $("select#bairro").find("option:selected").val();
          const quadra = this.value
          const s = "/fqi/" + encodeURIComponent(bairro) + "/" + encodeURIComponent(quadra) + ".jpg"
          // console.log(s);

          document.getElementById('imgitem').href = s;
          document.getElementById('imgviewer').src = s;

        });
      });
    </script>
  </body>
</html>
