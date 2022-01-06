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

while ($puissanceAvengers <= $thanos) {

	// Calcul puissance Avengers
	$puissanceIronMan = $ironman * 3 + 10;
	$puissanceSpiderman = $spiderman * 4 + 5;
	$puissanceCaptainamerica = $captainamerica * 3 + 7;
	$puissanceThor = $thor * 4 + 20;

	$puissanceAvengers = $puissanceIronMan + $puissanceSpiderman + $puissanceCaptainamerica + $puissanceThor;

	Html::debug($puissanceAvengers, 'Puissance Avengers');

	// Le modulo % => Le reste d'une division entière

	$tourAvenger = $tour%4;

	// 1 / 4 => 0 reste 1 => 1%4 => 1
	// 9 / 4 => 2 reste 1 => 9%4 => 1
	// 10 / 4 => 2 reste 2 => 10%4 => 2
	// 8 / 4 => 2 reste 0 => 8%4 => 0

	// 0, 1, 2, 3, 0, 1, 2, 3, 0, 1
	if ($tourAvenger == 0) {
		$ironman++;
	}

	if ($tourAvenger == 1) {
		$spiderman++;
	}

	if ($tourAvenger == 2) {
		$captainamerica++;
	}

	if ($tourAvenger == 3) {
		$thor++;
	}

	$tour++;
}

// REPONSE ATTENDUE -------------------
Html::debug($tour, 'Tours trouvés');
Html::debug('55', 'Réponse attendue', 'success');