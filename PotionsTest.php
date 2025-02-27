<?php

$tests = [
	[
		'nom' => '2 ingrédients, dans les quantités requises',
		'ingredients' => ['nuages_tenebreux' => 2, 'poussiere_fee' => 1],
		'potions' => 1
	],
	[
		'nom' => '2 ingrédients, mais pas assez du premier',
		'ingredients' => ['nuages_tenebreux' => 1, 'poussiere_fee' => 1],
		'potions' => 0
	],
	[
		'nom' => '2 ingrédients, dans les quantités X fois requises',
		'ingredients' => ['nuages_tenebreux' => 8, 'poussiere_fee' => 4],
		'potions' => 4
	],
	[
		'nom' => 'manque l\'ingrédient 1',
		'ingredients' => ['poussiere_fee' => 1],
		'potions' => 0
	],
	[
		'nom' => 'manque l\'ingrédient 2',
		'ingredients' => ['nuages_tenebreux' => 2],
		'potions' => 0
	],
	[
		'nom' => 'ingrédients autres',
		'ingredients' => ['queue_lezard' => 5, 'eau_jouvence' => 2],
		'potions' => 0
	],
	[
		'nom' => 'Aucun ingrédient',
		'ingredients' => [],
		'potions' => 0
	],
	[
		'nom' => 'Beaucoup ingrédient 1',
		'ingredients' => ['nuages_tenebreux' => 250, 'poussiere_fee' => 1],
		'potions' => 1
	],
	[
		'nom' => 'Beaucoup ingrédient 2',
		'ingredients' => ['nuages_tenebreux' => 2, 'poussiere_fee' => 120],
		'potions' => 1
	],
];

function nbPotionsFoudreRealisables(array $ingredients): int
{
	// Quantité requise pour une potion
	$req_nuages = 2;
	$req_poussiere = 1;

	// Vérifie si les ingrédients requis sont présents
	if (!isset($ingredients['nuages_tenebreux']) || !isset($ingredients['poussiere_fee'])) {
		return 0;
	}

	// Quantités disponibles
	$nb_nuages = $ingredients['nuages_tenebreux'];
	$nb_poussiere = $ingredients['poussiere_fee'];

	// Calcul du nombre max de potions qu'on peut faire
	$potions_max = min(intdiv($nb_nuages, $req_nuages), intdiv($nb_poussiere, $req_poussiere));

	return $potions_max;
}

// Lancer les tests
foreach ($tests as $test) {
	$resultat = nbPotionsFoudreRealisables($test['ingredients']);
	$expected = $test['potions'];

	if ($resultat === $expected) {
		echo '<h6 style="color: green;">Test : '. $test['nom'] .' ✅ OK</h6>';
	} else {
		echo '<h6 style="color: red;">Test : '. $test['nom'] .' ❌ KO (Attendu : '.$expected.', Obtenu : '.$resultat.')</h6>';
	}
}

test('example', function () {
    expect(true)->toBeTrue();
});

?>
