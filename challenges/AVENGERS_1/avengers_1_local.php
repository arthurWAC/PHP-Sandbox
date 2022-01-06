<?php
namespace Challenges\AVENGERS_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$ironman = 6;
$spiderman = 2;
$captainamerica = 7;
$thor = 4;
$thanos = 290;

Html::debug($ironman, '$ironman');
Html::debug($spiderman, '$spiderman');
Html::debug($captainamerica, '$captainamerica');
Html::debug($thor, '$thor');
Html::debug($thanos, '$thanos');

// CODE DU CHALLENGE ------------------

$tour = 0;
$puissanceAvengers = 0;

$tourDeRole = ['ironman', 'spiderman', 'captainamerica', 'thor'];

while ($puissanceAvengers <= $thanos) {

	// Calcul puissance Avengers
	$puissanceIronMan = $ironman * 3 + 10;
	$puissanceSpiderman = $spiderman * 4 + 5;
	$puissanceCaptainamerica = $captainamerica * 3 + 7;
	$puissanceThor = $thor * 4 + 20;

	$puissanceAvengers = $puissanceIronMan + $puissanceSpiderman + $puissanceCaptainamerica + $puissanceThor;

	Html::debug($puissanceAvengers, 'Puissance Avengers');

	// En 1 ligne :)
	${$tourDeRole[$tour%4]}++;

	$tour++;
}

// REPONSE ATTENDUE -------------------
Html::debug($tour, 'Tours trouvés');
Html::debug('55', 'Réponse attendue', 'success');