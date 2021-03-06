<?php
session_start();
$_SESSION['GENESIS_SCI_AUTH_OK'] = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Genesis SCIWeb</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link href="img/favicon.ico" rel="icon" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/sciweb/assets/css/style.css" />
</head>

<body>
  <!-- menubar -->
  <nav class="navbar navbar-expand navbar-dark bg-primary py-0">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="javascript:void(0);">
            <i class="fa fa-home"></i>
            Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <span class="navbar-text ml-auto py-0">
        <a id="link_login" class="nav-link" href="javascript:void(0);">
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

  <!-- header -->
  <div class="d-flex sectop">
    <div class="p-3">
      <img class="logo" src="./img/logotipo.png" />
    </div>
    <div class="p-2 pl-5 align-self-center">
      <h1>Sistema Gênesis SCIWeb</h1>
    </div>
    <div class="ml-auto align-self-center p-2 pr-4">
      <span>&nbsp;</span>
    </div>
  </div>

  <!-- row (container) -->
  <div class="row container-fluid justify-content-center mt-5">
    <div class="card-deck col-10">

      <!-- BCI -->
      <div class="card">
        <a id="link_bci" class="text-decoration-none text-dark" href="javascript:void(0)">
          <!-- <h5 class="card-header">BCIs</h5> -->
          <img class="card-img-top border" src="img/tmb_bci_1.jpg" alt="BCIs" />
          <div class="card-body">
            <h6 class="card-title">BCIs</h6>
            <!-- <p class="card-text">Consulta e visualização dos BCIs.</p> -->
          </div>
          <!-- <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div> -->
        </a>
      </div>

      <!-- Folha de Quadra -->
      <div class="card">
        <a id="link_vfqi" class="text-decoration-none text-dark" href="javascript:void(0)">
          <img class="card-img-top border" src="img/tmb_fqi_1.jpg" alt="Plantas de Quadra" />
          <div class="card-body">
            <h6 class="card-title">Plantas de Quadra</h6>
            <h6 class="card-subtitle mb-2 text-muted">Imagens</h6>
          </div>
        </a>
      </div>

      <!-- Loteamento -->
      <div class="card">
        <a id="link_loteam" class="text-decoration-none text-dark" href="javascript:void(0)">
          <img class="card-img-top border" src="img/tmb_lotea_1.jpg" alt="Loteamentos" />
          <div class="card-body">
            <h6 class="card-title">Loteamentos</h6>
          </div>
        </a>
      </div>

      <div class="card">
        <img src="img/bk.png" class="card-img-top border" alt="Soon..." />
        <div class="card-body">
          <h6 class="card-title">Desmembramentos</h6>
        </div>
      </div>

      <div class="card">
        <img src="img/bk.png" class="card-img-top border" alt="Soon..." />
        <div class="card-body">
          <h6 class="card-title">Logradouros - Nomenclatura</h6>
          <h6 class="card-subtitle mb-2 text-muted">Alterações / Leis</h6>
        </div>
      </div>

    </div>
  </div>

  <!-- row container 2 (test) -->
  <div class="row container-fluid justify-content-center mt-5">
    <div class="card-deck col-8">
      <div class="card">
        <h5 class="card-header">Prossimamente</h5>
        <div class="card-body">
          <h5 class="card-title">Prossimamente</h5>
          <p class="card-text">
            It's a broader card with text below as a natural lead-in to extra
            content. This content is a little longer.
          </p>
        </div>
      </div>

      <div class="card">
        <h5 class="card-header">Pronto</h5>
        <div class="card-body">
          <h5 class="card-title">Pronto</h5>
          <p class="card-text">
            This card has supporting text below as a natural lead-in to
            additional content.
          </p>
        </div>
      </div>

      <div class="card">
        <h5 class="card-header">скоро будет</h5>
        <div class="card-body">
          <h5 class="card-title">скоро будет</h5>
          <p class="card-text">
            It's a broader card with text below as a natural lead-in to extra
            content. This content is a little longer.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="container-fluid sectop">
    <div class="row p-3 mt-5">
      <div class="p-3">
        <img class="logo" src="img/logo80-200.png" />
      </div>
      <div class="flex-grow-1 align-self-center p-3 text-center">
        <h6 class="my-0">Gênesis Sistemas de Cadastro e Desenvolvimento de Software EIRELE</h6>
        <h6 class="text-muted small">Sistema de Cadastro Inteligente</h6>
      </div>
      <div class="ml-auto align-self-center p-3">
        <span class="fa fa-mobile fa-fw text-muted"></span>
        <span class="text-muted small">(31) 98718-5694</span>
        <br>
        <span class="fa fa-phone fa-fw text-muted"></span>
        <span class="text-muted small">(31) 3275-3428</span>
        <br>
        <span class="fa fa-envelope fa-fw text-muted"></span>
        <span class="text-muted small">genesis-sci@genesis-sci.com.br</span>
      </div>
    </div>
  </div>

  <!-- copyright -->
  <div class="d-flex bg-primary p-2 w-100 justify-content-center">
    <p class="small my-0 text-white">Copyright &copy; 2020 by Genesis SCI. Todos os direitos reservados.</p>
  </div>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js" integrity="sha512-7yA/d79yIhHPvcrSiB8S/7TyX0OxlccU8F/kuB8mHYjLlF1MInPbEohpoqfz0AILoq5hoD7lELZAYYHbyeEjag==" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script>
    var time = new Date().getTime();
    $(document.body).bind("mousemove keypress", function(e) {
      time = new Date().getTime();
    });

    function refresh() {
      if (new Date().getTime() - time >= 5 * 60 * 1000) { // minutes
        //window.location.reload(true);
        window.location.href = "sign-in?returnURL=%2Fsciweb%2F&request=logout";
      } else {
        setTimeout(refresh, 60000); // 1 min = 60 * 1000 milliseconds
      }
    }
    setTimeout(refresh, 60000); // milliseconds
  </script>


  <script>
    $(document).ready(function() {
      $("#link_login").on("click", function(e) {
        e.preventDefault();
        // window.location.href = "sign-in?returnurl=http%3A%2F%2Flocalhost%2Fsciweb";
        // window.location.href = "sign-in?returnURL=%2Fsciweb%2F";
        <?php
        if (isset($_SESSION['USERNAME'])) {
          echo 'window.location.href = "sign-in?returnURL=%2Fsciweb%2F&request=logout";';
        } else {
          echo 'window.location.href = "sign-in?returnURL=%2Fsciweb%2F";';
        }
        ?>
      });
      $("#link_bci").on("click", function(e) {
        e.preventDefault();
        window.location.href = "sign-in?returnURL=%2Fsciweb%2Fbci%2F";
      });
      $("#link_vfqi").on("click", function(e) {
        e.preventDefault();
        window.location.href = "sign-in?returnURL=%2Fsciweb%2Fvfqi%2F";
      });
      $("#link_loteam").on("click", function(e) {
        e.preventDefault();
        window.location.href = "sign-in?returnURL=%2Fsciweb%2Floteam%2F";
      });
    });
  </script>
</body>

</html>