<?php

include_once ('../lantern/request.php');
include_once ('../lantern/response.php');
include_once ('../lantern/router.php');
include_once ('../lantern/database.php');

$responseData = \lantern\router\execute($_SERVER['REQUEST_URI']);

\lantern\response\json($responseData);
