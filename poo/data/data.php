<?php

include_once('./models/Album.php');
include_once('./models/Artist.php');
include_once('./models/Playlist.php');
include_once('./models/Song.php');
include_once('./models/Style.php');
include_once('./models/User.php');
include_once('./functions/dump.php');

$songs = [];

$song1 = new Song();
$song1->setName('Fight fire with fire');
$song1->setDuration('00:04:45');
$song1->setPrice(0.99);

$song2 = new Song();
$song2->setName('Ride the lightning');
$song2->setDuration('00:06:37');
$song2->setPrice(0.99);

$song3 = new Song();
$song3->setName('For whom the bell tolls');
$song3->setDuration('00:05:10');
$song3->setPrice(0.99);

$song4 = new Song();
$song4->setName('Fade to black');
$song4->setDuration('00:06:57');
$song4->setPrice(0.99);

$song5 = new Song();
$song5->setName('Trapped under ice');
$song5->setDuration('00:04:04');
$song5->setPrice(0.99);

$song6 = new Song();
$song6->setName('Escape');
$song6->setDuration('00:04:24');
$song6->setPrice(0.99);

$song7 = new Song();
$song7->setName('Creeping death');
$song7->setDuration('00:06:36');
$song7->setPrice(0.99);

$song8 = new Song();
$song8->setName('The call of Ktulu');
$song8->setDuration('00:08:53');
$song8->setPrice(0.99);

$song9 = new Song();
$song9->setName('The ringer');
$song9->setDuration('00:05:38');
$song9->setPrice(0.99);

$songs[] = $song9;
$songs[] = $song8;
$songs[] = $song7;
$songs[] = $song6;
$songs[] = $song5;
$songs[] = $song4;
$songs[] = $song3;
$songs[] = $song2;
$songs[] = $song1;

$album1 = new Album();
$album1->setName('Ride the lightning');
$album1->setYear(1984);
$album1->addSong($song2);
$album1->addSong($song4);
$album1->addSong($song8);

$metallica = new Artist();
$metallica->setName('Metallica');
$metallica->setNationality('American');
$metallica->setYear(1981);
$metallica->addAlbum($album1);

$heavyMetal = new Style();
$heavyMetal->setName('Heavy Metal');
$trashMetal = new Style();
$trashMetal->setName('Metal');
$hardRock = new Style();
$hardRock->setName('Hard Rock');

foreach ($songs as $key => $song) {
    $song->addStyle($heavyMetal);
    $song->addStyle($hardRock);

    if ($key % 3 === 0) {
        $song->addStyle($trashMetal);
    }
}

$song2->addArtist($metallica);
