<?php
require('../app/core/router.php');
include('../app/controllers/UtilisateurController.php');
// $router = new Router();
$C = new UtilisateurController;

$C->Create('test','test2','test3');

?>


