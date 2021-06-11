<?php
$students = [
  'Albert' => [12, 8, 9, 7, 13],
  'Michel' => [14, 13, 12, 11, 10],
  'Vincent' => [17, 16, 15, 18, 13]
];

/**
 * @param int[]
 */
function calcAverage(array $notes): float
{
  $sum = 0;
  $count = 0;
  foreach ($notes as $note) {
    $sum += $note;
    $count++;
  }
  return $sum / $count;
}

function showStudents(array $students): string
{
  $html = '<table><thead><tr><th>Nom</th><th>Moyenne</th></tr></thead><tbody>';

  foreach ($students as $student => $notes) {
    $html .= '<tr><td>' . $student . '</td><td>' . calcAverage($notes) . '</td></tr>';
  }

  $html .= '</tbody></table>';

  return $html;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice 1 - Jour 2</title>
</head>

<body>
  <?= showStudents($students) ?>
</body>

</html>