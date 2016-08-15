<?php
require("constants.php");
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME) or die("Error".mysqli_error($conn));

?>