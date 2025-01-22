<?php
declare(strict_types=1);
require 'vendor/autoload.php';

use mywishlist\models\Liste;
use mywishlist\models\Item;

use Illuminate\Database\Capsule\Manager as DB;
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$liste = Liste::get();
foreach ($liste as $l) {
    echo "{$l->no}",
    " {$l->user_id}",
    " {$l->titre}",
    " {$l->description}",
    " {$l->expiration}",
    " {$l->token}<br>";
}