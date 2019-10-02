<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$resposta = $client->request("GET", "https://www.spacejam.com/archive/spacejam/movie/cmp/jamcentral/photos.html");

$html = $resposta->getBody()->getContents();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$subtitle = $crawler->filterXPath('//html/body/blockquote/font[1]');

foreach ($subtitle as $subtitulo)
{
    var_dump($subtitle->text());
}