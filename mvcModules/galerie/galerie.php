<?php
$model = new galerieModel($main['tables']['galeriebilder'], $db);
$controller = new galerieController($model);
$view = new galerieView($controller, $model);

$view->render();