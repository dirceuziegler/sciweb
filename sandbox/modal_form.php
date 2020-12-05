<?php
// require_once($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/check_auth.php');
// require($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/vertime.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Modal Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="../img/favicon.ico" rel="icon" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/sciweb/assets/css/style.css" />
</head>

<body>

  <!-- navbar -->
  <!-- <nav class="navbar navbar-expand navbar-dark bg-primary py-0">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a id="link_home" class="nav-link" href="javascript:void(0)">
            <i class="fa fa-home"></i>
            Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <span class="navbar-text ml-auto py-0">
        <a id="link_login" class="nav-link" href="javascript:void(0)">
          <?php
          // if (isset($_SESSION['USERNAME'])) {
          //   echo 'Logout (<i class="fa fa-user"></i> ' . $_SESSION['USERNAME'] . ') <i class="fa fa-sign-out"></i>';
          // } else {
          //   echo 'Login <i class="fa fa-sign-in"></i>';
          // }
          ?>
        </a>
      </span>
    </div>
  </nav> -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/sciweb/inc/reuse.php');
create_navbar();
?>

  <!-- header -->
  <div class="container-fluid sectop align-items-stretch">
    <div class="row">
      <div class="col-md-2 p-3">
        <img class="img-fluid logo" src="../img/logotipo.png" />
      </div>
      <div class="col-md-6 p-3 pl-4 my-auto">
        <h3>Modal Form</h3>
      </div>
      <div class="col-md-4 p-1 px-3 my-auto">
        <form id="f_searchoptions">
            <select id="searchoptions" class="custom-select custom-select-sm mb-1">
              <option disabled selected>Search Options</option>
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <select id="searchresults" class="custom-select custom-select-sm">
              <option disabled selected>Results</option>
              <option>Result 1</option>
              <option>Result 2</option>
              <option>Result 3</option>
            </select>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal 1 -->
  <div class="modal fade" tabindex="-1" role="dialog" id="myModal_1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Dialog 1</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="f_form_1">
            <div class="form-group row">
              <label for="inputEmail1" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail1" name="inputEmail1" 
                autocomplete="username" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword1" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword1" name="inputPassword1" 
                  autocomplete="current-password" placeholder="Password">
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn_ok_1" class="btn btn-outline-secondary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="modal fade" tabindex="-1" role="dialog" id="myModal_2" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Dialog 2</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form id="f_form_2">
            <div class="form-group row">
              <label for="distrito" class="col-sm-2 col-form-label">Distrito</label>
              <div class="col-sm-10">
                <select id="distrito" class="form-control custom-select custom-select-sm" name="distrito">
                  <option disabled selected>Distritos</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="zona" class="col-sm-2 col-form-label">Zona</label>
              <div class="col-sm-10">
                <select id="zona" class="form-control custom-select custom-select-sm" name="zona">
                  <option disabled selected>Zona</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="setor" class="col-sm-2 col-form-label">Setor</label>
              <div class="col-sm-10">
                <select id="setor" class="form-control custom-select custom-select-sm" name="setor">
                  <option disabled selected>Setor</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="quadra" class="col-sm-2 col-form-label">Quadra</label>
              <div class="col-sm-10">
                <select id="quadra" class="form-control custom-select custom-select-sm" name="quadra">
                  <option disabled selected>Quadra</option>
                  <option>001</option>
                  <option>002</option>
                  <option>003</option>
                  <option>004</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="Lote" class="col-sm-2 col-form-label">Lote</label>
              <div class="col-sm-10">
                <select id="lote" class="form-control custom-select custom-select-sm" name="lote">
                  <option disabled selected>Lote</option>
                  <option>0001</option>
                  <option>0002</option>
                  <option>0003</option>
                  <option>0004</option>
                </select>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn_ok_2" class="btn btn-outline-secondary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="modal fade" tabindex="-1" role="dialog" id="myModal_3" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Dialog 3</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <p id="error"></p> -->
          <form id="f_form_3">
            <label for="indcad" class="mr-sm-2">Índice Cadastral:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="DD.ZZ.SS.QQQ.LLLL" id="indcad" name="indcad" />
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn_ok_3" class="btn btn-outline-secondary" data-dismiss="modal">OK</button>
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

    // document.addEventListener("DOMContentLoaded", function() {
    //   // code
    // });

    $(document).ready(function() {
      //
      $('select#searchoptions').on('change', function(e) {
        const opt = $('select#searchoptions').find('option:selected').val();
        //
        $("#inputEmail1,#inputPassword1,#indcad").each(function() {
          $(this).val('');
        });
        $("select#distrito,select#zona,select#setor,select#quadra,select#lote").each(function() {
          $(this).val('');
        });
        //
        if (opt == 'Option 1') {
          $('#myModal_1').modal('show');
        } else if (opt == 'Option 2') {
          $('#myModal_2').modal('show');
        } else if (opt == 'Option 3') {
          $('#myModal_3').modal('show');
        } else {
          console.log(opt);
        }
      });

      // $("#btn_ok_3").on('click', function (e) {
      //   console.log(e);
      //   console.log($("#f_form_3").serialize());
      // })

      $("#myModal_1").on("click", "#btn_ok_1", function(){
        console.log($("#f_form_1").serialize());
      });

      $("#myModal_2").on("click", "#btn_ok_2", function(){
        console.log($("#f_form_2").serialize());
      });

      $("#myModal_3").on("click", "#btn_ok_3", function(){
        console.log($("#f_form_3").serialize());
      });

      // $('select#searchoptions').on('focus', function(e) {
      //   this.selectedIndex = 0;
      // });

      // let sopt = document.querySelector('select#searchoptions');
      // sopt.addEventListener('focus', function(e) {
      //     this.selectedIndex = 0;
      // })

      document.querySelector('select#searchoptions')
        .addEventListener('focus', function(e) {
          this.selectedIndex = 0;
      })

    });
  </script>
</body>

</html>

<!-- 
$("#myModal").on("click",".btn-default", function(){
       // code
    });

    $("#myModal").on("click",".btn-primary", function(){
       // code
    });


    $("#btn_ok_1").click(function (e) {
  var selectedOption = $('select#select1 option:selected').val;

  // Do some work with selected item.
})    

php 
-dxdebug.remote_enable=1 
-dxdebug.remote_mode=req 
-dxdebug.remote_port=9000 
-dxdebug.remote_host=127.0.0.1 
-dxdebug.remote_connect_back=1 /var/www/html/teste.php
 -->
