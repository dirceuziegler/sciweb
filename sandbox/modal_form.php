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
          if (isset($_SESSION['USERNAME'])) {
            echo 'Logout (<i class="fa fa-user"></i> ' . $_SESSION['USERNAME'] . ') <i class="fa fa-sign-out"></i>';
          } else {
            echo 'Login <i class="fa fa-sign-in"></i>';
          }
          ?>
        </a>
      </span>
    </div>
  </nav>

  <div class="container-fluid sectop align-items-stretch">
    <div class="row">
      <div class="col-md-3 p-3">
        <img class="img-fluid" src="../img/logotipo.png" />
      </div>
      <div class="col-md-5 p-3 my-auto">
        <h3>Modal Form</h3>
      </div>
      <div class="col-md-4 p-3 my-auto">
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
