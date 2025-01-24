<?php
declare(strict_types=1);
require 'vendor/autoload.php';

use rugby\models\Arbitre;
use rugby\models\Equipe;
use rugby\models\Joueur;
use rugby\models\Matchs;
use rugby\models\Poste;
use rugby\models\Stade;

// table pivot : arbitrer - jouer

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$arbitre = Arbitre::get();
foreach ($arbitre as $a) {
    echo "{$a->no}",
    " {$a->nomArbitre}",
    " {$a->nationalite}<br>";
}

echo "-------------<br>";

$q1 = Equipe ::where('pays', 'like', 'F%')->get();
echo "Equipe dont le pays commence par F<br>";
foreach ($q1 as $e) {
    echo "{$e->no}",
    " {$e->pays}<br>";
}