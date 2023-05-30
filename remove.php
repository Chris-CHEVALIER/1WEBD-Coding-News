<?php

require("header.php");
$articleController->remove($_GET["id"]);
echo "<script>window.location.href='index.php'</script>";
