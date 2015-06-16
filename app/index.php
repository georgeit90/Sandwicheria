<?php
//autoloder
 error_reporting(E_ALL);
 ini_set('display_errors', True);
 
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Admin.php';
require 'libs/Salon.php';
require 'libs/Cocina.php';

require 'libs/Database.php';
require 'libs/Session.php';
require 'config/paths.php';
require 'config/database.php';
$app = new Bootstrap();
?>