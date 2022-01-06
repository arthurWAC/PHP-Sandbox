<?php
namespace Challenges\FOOTBALL_3;

use Tainix\Html;

// ECHANTILLON ------------------------
$group = ['BEL', 'TUR', 'ANG', 'FIN', 'RUS'];
$scores = ['BEL_TUR_1_0', 'BEL_ANG_0_1', 'BEL_FIN_3_3', 'BEL_RUS_2_0', 'TUR_BEL_2_2', 'TUR_ANG_1_2', 'TUR_FIN_4_2', 'TUR_RUS_1_1', 'ANG_BEL_4_4', 'ANG_TUR_2_1', 'ANG_FIN_1_0', 'ANG_RUS_3_2', 'FIN_BEL_0_0', 'FIN_TUR_1_0', 'FIN_ANG_2_0', 'FIN_RUS_2_0', 'RUS_BEL_0_0', 'RUS_TUR_2_3', 'RUS_ANG_0_1', 'RUS_FIN_1_2'];

Html::debug($group, '$group');
Html::debug($scores, '$scores');

// CODE DU CHALLENGE ------------------




// REPONSE ATTENDUE -------------------
Html::debug('ANGFINBELTURRUS', 'Réponse attendue', 'success');