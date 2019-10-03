<?php
require 'vendor/autoload.php';
require 'src/BuscaSub.php';

use Forseti\BuscaSJ\BuscaSub;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.spacejam.com/']);
$crawler = new Crawler();

$buscador = new BuscaSub($client, $crawler);
$subtitle = $buscador->buscar('archive/spacejam/movie/cmp/jamcentral/photos.html');

foreach ($subtitle as $subtitulo)
{
    var_dump($subtitle);
}