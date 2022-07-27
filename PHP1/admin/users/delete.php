<?php
require_once "../../db/san_pham.php";
$id = intval($_GET['id']);
deleteById($id);
header("Location: index.php");

?>