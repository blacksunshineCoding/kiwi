<?php
$model = new galerieModel($main['tables']['galeriebilder']);
$controller = new galerieController($model);
$view = new galerieView($controller, $model);

$view->render();