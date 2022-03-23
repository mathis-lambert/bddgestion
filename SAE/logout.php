<?php
session_start();
session_destroy();
header('Location: http://bdd.gestion/SAE/index.php');
exit();
