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

$tourIronMan = true;
$tourSpiderman = false;
$tourCaptainamerica = false;
$tourThor = false;

while ($puissanceAvengers <= $thanos) {

	// Calcul puissance Avengers
	$puissanceIronMan = $ironman * 3 + 10;
	$puissanceSpiderman = $spiderman * 4 + 5;
	$puissanceCaptainamerica = $captainamerica * 3 + 7;
	$puissanceThor = $thor * 4 + 20;

	$puissanceAvengers = $puissanceIronMan + $puissanceSpiderman + $puissanceCaptainamerica + $puissanceThor;

	Html::debug($puissanceAvengers, 'Puissance Avengers');

	// Avec un switch true
	switch (true) {
		case $tourIronMan:
			$ironman++;
			$tourIronMan = false;
			$tourSpiderman = true;
		break;

		case $tourSpiderman:
			$spiderman++;
			$tourSpiderman = false;
			$tourCaptainamerica = true;
		break;

		case $tourCaptainamerica:
			$captainamerica++;
			$tourCaptainamerica = false;
			$tourThor = true;
		break;

		case $tourThor:
			$thor++;
			$tourThor = false;
			$tourIronMan = true;
		break;
	}
}

// REPONSE ATTENDUE -------------------
Html::debug($tour, 'Tours trouvés');
Html::debug('55', 'Réponse attendue', 'success');