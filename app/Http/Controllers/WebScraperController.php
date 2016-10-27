<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use Session;
use Sunra\PhpSimple\HtmlDomParser;

class WebScraperController extends Controller
{
    //
    public function index()
    {
    	$Client = new Client();

    	$guzzleclient = new \GuzzleHttp\Client([
    		'timeout' => 60,
    		'verify'  => false,
    	]);

    	$html = HtmlDomParser::file_get_html('http://licitacoes.ssp.df.gov.br./index.php/licitacoes/cat_view/1-licitacoes/4-concorrencia');
	    
	    foreach ($html->find('div.dm_row') as $title) {
	    	$item['name'] = $title->find('h3.dm_title', 0)->plaintext;
	    	$item['title'] = $title->find('a', 0)->title;
	    	$item['file'] = $title->find('a', 1)->href;
	    	$item['object'] = $title->find('p', 0)->plaintext;
	    	$item['starting_date'] = $title->find('td', 1)->plaintext;

	    	$data[] = $item;
	    }
	    
        $domain = "http://licitacoes.ssp.df.gov.br.";
    	
    	return view('crawler', compact('data', 'domain'));
    }
}
