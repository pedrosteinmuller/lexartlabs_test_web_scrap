<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Exception;
// use Symfony\Component\BrowserKit\HttpBrowser;
use Illuminate\Http\Request;
use App\Models\SearchResult;

class SearchController extends Controller
{
    public function searchMercadoLivre(Request $request)
    {
        $searchText = $request->input('searchText');
        $results = $this->webScrapMercadoLivre($searchText);

        // Salvando os resultados no banco de dados
        $this->saveResults($results);

        return response()->json(['products' => $results]);
    }

    public function searchBuscape(Request $request)
    {
        $searchText = $request->input('searchText');
        $results = $this->webScrapBuscape($searchText);

        $this->saveResults($results);

        return response()->json(['products' => $results]);
    }

    private function saveResults($results)
    {
        if (empty($results)) {
            return;
        }

        try {
            foreach ($results as $result) {
                SearchResult::create([
                    'photo' => $result['Photo'],
                    'description' => $result['Description'],
                    'category' => $result['Category'],
                    'price' => $result['Price'],
                    'source_website' => $result['Website'],
                ]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();        }
    }

    private function webScrapMercadoLivre($searchText)
    {
        $baseUrl = 'https://www.mercadolivre.com.br/';
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', $baseUrl);

        // echo "<pre>";
        // print_r($crawler);

        $form = $crawler->filter('.nav-search')->form();

        $form['nav-search-input'] = $searchText;

        $crawler = $client->submit($form);


        $results = $crawler->filter('.ui-search-result__wrapper')->slice(0, 5)->each(function (Crawler $node) use ($client) {
            $description = $node->filter('h2')->text();
            $price = $node->filter('.andes-money-amount__fraction')->text();
            $link = $node->filter('a.ui-search-item__group__element')->attr('href');
            $photo = $node->filter('.shops__image-element')->attr('data-src');
            $category = 'Mobile';

            try {
                usleep(100000);
                $productPage = $client->request('GET', $link);
                $description = $productPage->filter('.ui-pdp-description__content')->text();
            } catch(Exception $e) {
            }

            return [
                'Photo' => $photo,
                'Description' => $description,
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

        $results = $crawler->filter('.ProductCard_ProductCard__EEJFq')->slice(0, 5)->each(function (Crawler $node) {
            $description = $node->filter('.ProductCard_ProductCard_Name__LT7hv')->text();
            $price = $node->filter('.Text_MobileHeadingS__Zxam2')->text();
            $link = $node->filter('.ProductCard_ProductCard_Inner__tsD4M')->attr('href');
            $photo = $node->filter('.ProductCard_ProductCard_Image__qriN4 span img')->attr('src');
            $category = 'Mobile';

            return [
                'Photo' => $photo,
                'Description' => $description,
                'Category' => $category,
                'Price' => $price,
                'Website' => 'Buscapé',
                'Link' => $link,
            ];
        });

        return $results;
    }
}
