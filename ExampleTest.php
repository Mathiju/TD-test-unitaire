<?php


declare(strict_types=1);


require_once __DIR__ . '/PotionsTest.php';


use function PHPUnit\Framework\assertEquals;


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
        'nom' => "manque l'ingrédient 1",
        'ingredients' => ['poussiere_fee' => 1],
        'potions' => 0
    ],
    [
        'nom' => "manque l'ingrédient 2",
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


foreach ($tests as $test) {
    test($test['nom'], function () use ($test) {
        expect(nbPotionsFoudreRealisables($test['ingredients']))->toBe($test['potions']);
    });
}
