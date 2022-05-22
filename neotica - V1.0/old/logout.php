<?php
session_start();
session_destroy();
header('Location: https://neotica.ml-digital.fr/index.php');
exit();
