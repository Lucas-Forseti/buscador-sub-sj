<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.spacejam.com/']);
$crawler = new Crawler();

$buscador = new \Forseti\BuscaSJ\BuscaSub($client, $crawler);
$subtitle = $buscador->buscar('archive/spacejam/movie/cmp/jamcentral/photos.html');

$subtitle = $crawler->filterXPath('//html/body/blockquote/font[1]');

foreach ($subtitle as $subtitulo)
{
    var_dump($subtitle->text());
}