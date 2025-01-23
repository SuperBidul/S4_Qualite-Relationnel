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

if (isset($_GET['id'])){
    $i = Item::where('id', '=', $_GET['id'])->first();
    echo '--------------<br>';
    echo "{$i->id},
    {$i->liste_id},
    {$i->nom},
    {$i->descr},
    <img src='img/{$i->img}' height=100 width=100>,
    {$i->url},
    {$i->tarif}<br>";
}

$item = new Item();
$item->liste_id = 1;
$item->nom = 'nom_item';
$item->descr = 'descr_item';
$item->img = 'img_item.jpg';
$item->url = 'http://localhost/test/td10/xxxx.html';
$item->tarif = 99.99;
$item->save();