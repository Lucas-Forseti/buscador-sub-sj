<?php


namespace Forseti\BuscaSJ;


use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscaSub
{
    private $httpClient;
    private $crawler;
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }
    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request("GET", $url);

        $html = $resposta->getBody()->getContents();

        $crawler = new Crawler();
        $this->crawler->addHtmlContent($html);

        $elementoSubtitle = $this->crawler->filterXPath('//html/body/blockquote/font[1]');
        $subtitle = [];

        foreach ($elementoSubtitle as $elemento)
        {
            $subtitle[] = $elemento->textContent;
        }

        return $subtitle;
    }
}