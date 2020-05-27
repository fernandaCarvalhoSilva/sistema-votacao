<?php
require_once 'app/routes/Routes.php';

require_once 'lib/database/Connection.php';

require_once 'app/controller/EnqueteController.php';
require_once 'app/controller/Controller.php';

require_once 'app/model/Enquete.php';
require_once 'app/model/Opcoes.php';

$route = new Routes();
$route->start($_GET);