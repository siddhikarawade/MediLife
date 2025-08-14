<?php
session_start();
if (isset($_SESSION['loginsuccess'])){

  unset($_SESSION['loginsuccess']);
  header('Location: ../../login.php');
} 