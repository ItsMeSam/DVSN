<?php

include "Acuney_lib/Acuney.class.php";
include "Acuney_lib/Model.class.php";
include "Acuney_lib/Controller.class.php";
include "Acuney_lib/View.class.php";
include "Acuney_lib/Route.class.php";
include "Acuney_lib/RouteGroup.class.php";
include "Acuney_lib/Router.class.php";
include "Acuney_lib/RegTPL.class.php";

use Acuney\Core\Acuney;

$acuney = new Acuney();
$acuney->set('modeldir', 'app/models/');
$acuney->set('viewdir', 'app/view/');
$acuney->set('controllerdir', 'app/controllers/');
$acuney->set('templatedir', '../public/');
$acuney->set('basepath', '/DVSN');

//.. Site configuration
define("SITE_URL", "http://127.0.0.1/DVSN/");

//.. MySQL configuration
define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "");
define("MYSQL_DB",	 "dvsn");