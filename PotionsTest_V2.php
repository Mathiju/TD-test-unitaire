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
	$recette = [
		'nuages_tenebreux' => 2,
		'poussiere_fee' => 1
	];

	$nbPotionsParIngredient = [];

	foreach ($recette as $ingredient => $quantiteNecessaire) {

		if (!isset($ingredients[$ingredient])) {
			return 0;
		}

		if ($ingredients[$ingredient] < $quantiteNecessaire) {
			return 0;
		}

		$nbPotionsParIngredient[] = floor($ingredients[$ingredient] / $quantiteNecessaire);
	}

	return min($nbPotionsParIngredient);
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