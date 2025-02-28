<?php


function nbPotionsFoudreRealisables(array $ingredients): int
{
    $recette = [
        'nuages_tenebreux' => 2,
        'poussiere_fee' => 1
    ];


    $nbPotionsParIngredient = [];


    foreach ($recette as $ingredient => $quantiteNecessaire) {
        if (!isset($ingredients[$ingredient]) || $ingredients[$ingredient] < $quantiteNecessaire) {
            return 0;
        }


        $nbPotionsParIngredient[] = intdiv($ingredients[$ingredient], $quantiteNecessaire);
    }


    return min($nbPotionsParIngredient);
}
