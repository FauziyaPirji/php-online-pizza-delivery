<?php

session_start();

session_destroy();

header("location: /php-online-pizza-delivery/admin/admin_index.php");
?>