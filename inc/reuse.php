<?php
// session_start();
// if ($_SESSION['GENESIS_SCI_AUTH_OK'] != true) {
//     die('Restricted Access');
// }

function create_navbar() {
    $s = '
    <nav class="navbar navbar-expand navbar-dark bg-primary py-0">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a id="link_home" class="nav-link" href="javascript:void(0)">
            <i class="fa fa-home"></i>
            Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <span class="navbar-text ml-auto py-0">
        <a id="link_login" class="nav-link" href="javascript:void(0)">';
    //
    if (isset($_SESSION['USERNAME'])) {
        $s .= 'Logout (<i class="fa fa-user"></i> ' . $_SESSION['USERNAME'] . ') <i class="fa fa-sign-out"></i>';
    } else {
        $s .= 'Login <i class="fa fa-sign-in"></i>';
    }
    //
    $s .= '        
        </a>
      </span>
    </div>
  </nav>';
  //
  echo $s;
}