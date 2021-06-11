<?php

/**
 * createCardGame
 *
 * @return array
 */
function createCardGame(): array
{
  $cardGame = [];
  $cardTypes = ['Coeur', 'Trèfle', 'Carreau', 'Pique'];
  $cardSpec = ['Valet', 'Dame', 'Roi'];

  foreach ($cardTypes as $cardType) {
    for ($i = 0; $i < 10; $i++) {
      if ($i + 1 === 1) {
        $cardGame[] = 'As de ' . $cardType;
      } else {
        $cardGame[] = $i + 1 . ' de ' . $cardType;
      }
    }
    foreach ($cardSpec as $card) {
      $cardGame[] = $card . ' de ' . $cardType;
    }
  }

  return $cardGame;
}


/**
 * getCard
 *
 * @param  array $cardGame
 * @return string
 */
function getCard(array $cardGame): string
{
  $key = rand(0, 51);

  return $cardGame[$key];
}

/**
 * getFirstsCards
 * Permet de piocher des cartes
 * @param  int $nbr
 * @param  array $cardGame
 * @return array
 */
function getFirstsCards(int $nbr, array &$cardGame): array
{
  $cards = [];
  for ($i = 0; $i < $nbr; $i++) {
    $cards[] = $cardGame[0];
    array_splice($cardGame, 0, 1);
  }

  return $cards;
}


/**
 * customShuffle
 *
 * @param  array $array
 * @return void
 */
function customShuffle(array &$array)
{
  $shuffled = [];

  while (count($array) > 0) {
    $randomKey = rand(0, count($array) - 1);
    $shuffled[] = $array[$randomKey];
    array_splice($array, $randomKey, 1, []);
  }

  return $shuffled;
}

$cardGame = createCardGame();

customShuffle($cardGame);
echo '<pre>';
var_dump($cardGame);
echo '</pre>';
$cards = getFirstsCards(5, $cardGame);
echo '<pre>';
var_dump($cardGame);
echo '</pre>';
echo '<pre>';

var_dump($cards);
echo '</pre>';
