<?php require_once('Connections/conn92ID.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_rsEquipe = 3;
$pageNum_rsEquipe = 0;
if (isset($_GET['pageNum_rsEquipe'])) {
  $pageNum_rsEquipe = $_GET['pageNum_rsEquipe'];
}
$startRow_rsEquipe = $pageNum_rsEquipe * $maxRows_rsEquipe;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsEquipe = "SELECT * FROM tb_equipe WHERE EQP_STATUS = 1";
$query_limit_rsEquipe = sprintf("%s LIMIT %d, %d", $query_rsEquipe, $startRow_rsEquipe, $maxRows_rsEquipe);
$rsEquipe = mysql_query($query_limit_rsEquipe, $conn92ID) or die(mysql_error());
$row_rsEquipe = mysql_fetch_assoc($rsEquipe);

if (isset($_GET['totalRows_rsEquipe'])) {
  $totalRows_rsEquipe = $_GET['totalRows_rsEquipe'];
} else {
  $all_rsEquipe = mysql_query($query_rsEquipe);
  $totalRows_rsEquipe = mysql_num_rows($all_rsEquipe);
}
$totalPages_rsEquipe = ceil($totalRows_rsEquipe/$maxRows_rsEquipe)-1;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsConvenios = "SELECT * FROM tb_convenios WHERE CONV_STATUS = 1";
$rsConvenios = mysql_query($query_rsConvenios, $conn92ID) or die(mysql_error());
$row_rsConvenios = mysql_fetch_assoc($rsConvenios);
$totalRows_rsConvenios = mysql_num_rows($rsConvenios);

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsUnidades = "SELECT * FROM tb_lojas WHERE LOJ_STATUS = 1";
$rsUnidades = mysql_query($query_rsUnidades, $conn92ID) or die(mysql_error());
$row_rsUnidades = mysql_fetch_assoc($rsUnidades);
$totalRows_rsUnidades = mysql_num_rows($rsUnidades);

$maxRows_rsDepomeimentos = 10;
$pageNum_rsDepomeimentos = 0;
if (isset($_GET['pageNum_rsDepomeimentos'])) {
  $pageNum_rsDepomeimentos = $_GET['pageNum_rsDepomeimentos'];
}
$startRow_rsDepomeimentos = $pageNum_rsDepomeimentos * $maxRows_rsDepomeimentos;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsDepomeimentos = "SELECT * FROM tb_depoimentos WHERE DEP_STATUS = 1";
$query_limit_rsDepomeimentos = sprintf("%s LIMIT %d, %d", $query_rsDepomeimentos, $startRow_rsDepomeimentos, $maxRows_rsDepomeimentos);
$rsDepomeimentos = mysql_query($query_limit_rsDepomeimentos, $conn92ID) or die(mysql_error());
$row_rsDepomeimentos = mysql_fetch_assoc($rsDepomeimentos);

if (isset($_GET['totalRows_rsDepomeimentos'])) {
  $totalRows_rsDepomeimentos = $_GET['totalRows_rsDepomeimentos'];
} else {
  $all_rsDepomeimentos = mysql_query($query_rsDepomeimentos);
  $totalRows_rsDepomeimentos = mysql_num_rows($all_rsDepomeimentos);
}
$totalPages_rsDepomeimentos = ceil($totalRows_rsDepomeimentos/$maxRows_rsDepomeimentos)-1;
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="robots" content="index, follow">
<meta name="description" content="O melhor e mais completo servi