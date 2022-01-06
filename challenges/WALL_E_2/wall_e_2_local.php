<?php
namespace Challenges\WALL_E_2;

use Tainix\Html;

// ECHANTILLON ------------------------
$batterie = 87;
$cote = 6;
$dechets = ['2,4', '7,5', '6,2', '7,6', '3,4', '6,5', '3,1', '7,2'];
$chargeurs = ['3,7', '7,4'];

Html::debug($batterie, '$batterie');
Html::debug($cote, '$cote');
Html::debug($dechets, '$dechets');
Html::debug($chargeurs, '$chargeurs');

// CODE DU CHALLENGE ------------------




// REPONSE ATTENDUE -------------------
Html::debug('76', 'Réponse attendue', 'success');