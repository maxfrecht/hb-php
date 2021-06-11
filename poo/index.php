<?php
include_once './data/data.php';

include_once './functions/dump.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <main>
    <div class="container">
      <h2>Songs</h2>
      <div class="songs">
        <?php
        foreach ($songs as $song) {
            $html .= '<div class="song"><h3>'.$song->getName().'</h3><p>'.$song->getDuration().'</p>'.(count($song->getArtists()) > 0 ? '<p>'.$song->getArtists()[0]->getName().'</p>' : '').'<p class="price">'.$song->getPrice().' €</p><div class="styles">';

            foreach ($song->getStyles() as $style) {
                $html .= '<span>'.$style->getName().'</span>';
            }

            $html .= '</div></div>';
        }
        echo $html;
        ?>
      </div>
      <div class="album">
        <?php echo '<h2>'.$album1->getName().'</h2><p>'.$album1->getYear().'</p><p>Durée : '.$album1->getTotalDuration().'</p>'; ?>
        <div class="songs">
          <?php
          foreach (($album1->getSongs()) as $song) {
              $html2 .= '<div class="song"><h3>'.$song->getName().'</h3><p>'.$song->getDuration().'</p>'.(count($song->getArtists()) > 0 ? '<p>'.$song->getArtists()[0]->getName().'</p>' : '').'<p class="price">'.$song->getPrice().' €</p><div class="styles">';

              foreach ($song->getStyles() as $style) {
                  $html2 .= '<span>'.$style->getName().'</span>';
              }

              $html2 .= '</div></div>';
          }
          echo $html2;
          ?>
        </div>
      </div>
  </main>
</body>

</html>