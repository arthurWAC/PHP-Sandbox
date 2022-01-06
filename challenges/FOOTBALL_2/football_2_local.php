<?php
namespace Challenges\FOOTBALL_2;

use Tainix\Html;

// ECHANTILLON ------------------------
$dispositif = '4-2-4';
$forces = [27, 30, 8, 2, 1, 10, 7, 11, 19, 22, 12, 13, 29, 39, 35, 25, 32, 17, 14, 20, 31];
$postes = ['G', 'G', 'A', 'A', 'D', 'G', 'D', 'A', 'A', 'M', 'M', 'D', 'A', 'A', 'A', 'D', 'D', 'A', 'D', 'G', 'D'];

Html::debug($dispositif, '$dispositif');
Html::debug($forces, '$forces');
Html::debug($postes, '$postes');

// CODE DU CHALLENGE ------------------




// REPONSE ATTENDUE -------------------
Html::debug('13-14-16-20-1-12-15-9-8-18-10', 'Réponse attendue', 'success');