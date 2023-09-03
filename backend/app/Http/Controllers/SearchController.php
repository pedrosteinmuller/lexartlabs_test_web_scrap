<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchResult;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        //lógica de pesquisa e scraping para retornar os resultados em JSON
    }

    public function saveResult(Request $request)
    {
        //lógica para salvar resultados no banco de dados
    }
}
