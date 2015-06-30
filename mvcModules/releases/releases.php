<?php
$model = new releasesModel($main['tables']['releases'], $db);
$controller = new releasesController($model);
$view = new releasesView($controller, $model);

$view->render();