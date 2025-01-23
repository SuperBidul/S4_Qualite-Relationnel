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

/* CREER UN NOUVEL ITEM
$item = new Item();
$item->liste_id = 1;
$item->nom = 'rose';
$item->descr = 'une rose rose';
$item->img = 'rose.jpg';
$item->url = '';
$item->tarif = 99.99;
$item->save();
*/

echo '--------------<br>';

$items = Item::get();
foreach ($items as $i) {
    echo "{$i->id},
    {$i->liste_id},
    {$i->liste()->first()->titre},
    {$i->nom},
    {$i->descr},
    <img src='img/{$i->img}' height=100 width=100>,
    {$i->url},
    {$i->tarif}<br>";
}