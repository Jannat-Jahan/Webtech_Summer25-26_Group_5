<?php

session_start();

session_unset();

session_destroy();

setcookie("remember_owner", "", time() - 3600, "/");
setcookie("remember_tenant", "", time() - 3600, "/");
setcookie("remember_admin", "", time() - 3600, "/");

header("Location: ../View/index.php");
exit();

?>