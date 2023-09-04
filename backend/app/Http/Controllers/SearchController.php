<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;
use App\Models\SearchResult;

class SearchController extends Controller
{
    public function searchMercadoLivre(Request $request)
    {
        $searchText = $request->input('searchText');
        $results = $this->webScrapMercadoLivre($searchText);

        // Salvando os resultados no banco de dados
        foreach ($results as $result) {
            SearchResult::create([
                'photo' => $result['Photo'],
                'description' => $result['Description'],
                'category' => $result['Category'],
                'price' => $result['Price'],
                'source_website' => $result['Website'],
            ]);
        }

        return response()->json(['products' => $results]);
    }

    public function searchBuscape(Request $request)
    {
        $searchText = $request->input('searchText');
        $results = $this->webScrapBuscape($searchText);

        foreach ($results as $result) {
            SearchResult::create([
                'photo' => $result['Photo'],
                'description' => $result['Description'],
                'category' => $result['Category'],
                'price' => $result['Price'],
                'source_website' => $result['Website'],
            ]);
        }

        return response()->json(['products' => $results]);
    }

    private function webScrapMercadoLivre($searchText)
    {
        $baseUrl = 'https://www.mercadolivre.com.br/';
        $client = new Client();
        $crawler = $client->request('GET', $baseUrl . 'search/' . urlencode($searchText));

        $results = $crawler->filter('')->each(function (Crawler $node) {
            $title = $node->filter('')->text();
            $price = $node->filter('')->text();
            $link = $node->filter('')->attr('href');
            $photo = $node->filter('')->attr('src');
            $category = 'Mobile';

            return [
                'Photo' => $photo,
                'Description' => $title,
                'Category' => $category,
                'Price' => $price,
                'Website' => 'Mercado Livre',
                'Link' => $link,
            ];
        });

        return $results;
    }

    private function webScrapBuscape($searchText)
    {
        $baseUrl = 'https://www.buscape.com.br/';
        $client = new Client();
        $crawler = $client->request('GET', $baseUrl . 'search/' . urlencode($searchText));

        $results = $crawler->filter('')->each(function (Crawler $node) {
            $title = $node->filter('')->text();
            $price = $node->filter('')->text();
            $link = $node->filter('')->attr('href');
            $photo = $node->filter('')->attr('src');
            $category = 'Mobile';

            return [
                'Photo' => $photo,
                'Description' => $title,
                'Category' => $category,
                'Price' => $price,
                'Website' => 'Buscapé',
                'Link' => $link,
            ];
        });

        return $results;
    }
}
