<?php

require "vendor/autoload.php";
use HG\Controllers\FightController;

$data = FightController::fight();
require "src/views/fight.view.php";
