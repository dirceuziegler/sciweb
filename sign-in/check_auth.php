<?php
session_start();
if ($_SESSION['GENESIS_SCI_AUTH_OK'] != true) {
    die('Restricted Access');
}

