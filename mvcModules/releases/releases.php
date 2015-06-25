<?php
$model = new releasesModel($main['tables']['releases']);
$controller = new releasesController($model);
$view = new releasesView($controller, $model);

$view->render();