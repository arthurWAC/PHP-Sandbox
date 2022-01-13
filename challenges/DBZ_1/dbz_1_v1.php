<?php
declare(strict_types=1);

namespace Challenges\DBZ_1;

use Tainix\Html;

// ECHANTILLON ------------------------
$ennemis = [184, 231, 657, 726, 865, 1021, 1455];
$forceVegeta = 112;

Html::debug($ennemis, '$ennemis');
Html::debug($forceVegeta, '$forceVegeta');

// CODE DU CHALLENGE ------------------

// Végéta démarre avec une certaine force. Il démarre toujours au niveau 1.
$niveauVegeta = 1;

// Il va affronter un certain nombre d’ennemis, identifiés par leur puissance respective. Les ennemis sont affrontés dans l’ordre du tableau.
foreach ($ennemis as $puissanceEnnemi) {

	// Il peut augmenter son niveau au(tant que) (=while) nécessaire, hors de question que le prince Sayan ne se fasse battre par un vulgaire combattant !
	while (puissanceVegeta($forceVegeta, $niveauVegeta) < $puissanceEnnemi) {
		// Mais si Végéta n’a pas la puissance nécessaire pour battre l’ennemi, alors il se transforme en super Sayan et augmente son niveau de 1. 
		$niveauVegeta++;
	}

	// Lorsque Végéta terrasse un ennemi sa force augmente. Il récupère en effet 10% de la puissance de son ennemi.
	// Précision : La force récupérée sur chaque adversaire doit être arrondie à l’entier inférieur.
	$forceVegeta += (int) floor($puissanceEnnemi * 0.1); // 5.0 => 5
}

// Tu dois retourner la puissance finale de Végéta, une fois qu’il a terrassé son dernier adversaire.
$puissanceVegetaFinale = puissanceVegeta($forceVegeta, $niveauVegeta);
Html::debug($puissanceVegetaFinale, 'Puissance finale');

// Lorsqu’il combat, c’est sa puissance qui rentre en compte. Sa puissance est égale à sa force multipliée par son niveau actuel.
function puissanceVegeta(int $force, int $niveau): int
{
	return $force * $niveau;
}

// REPONSE ATTENDUE -------------------
Html::debug('3115', 'Réponse attendue', 'success');