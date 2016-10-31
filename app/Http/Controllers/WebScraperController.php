<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Sunra\PhpSimple\HtmlDomParser;
use Symfony\Component\DomCrawler\Crawler;
use Goutte\Client;


class WebScraperController extends Controller
{
    // Using Simple Html Dom Parser
    public function sspdf()
    {
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
    	
    	return view('sspdf', compact('data', 'domain'));
    }//end sspdf

    // Using Goutte and DomCrawler
    public function sebrae()
    {
        $client = new Client();

        //$cliente->request() returns DomCrawler object
        $crawler = $client->request('GET', 'http://www.portal.scf.sebrae.com.br/licitante/frmPesquisarAvancadoLicitacao.aspx');

        $origin = $crawler->filter('span.unidade')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $title = $crawler->filter('#resultadoBusca h3')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $values = $crawler->filter('#resultadoBusca p')->each(function (Crawler $node, $i) {
            $replace = array('Data de Abertura : ', 'hSituação:', 'Local da Licitação: ', 'Telefone: ', 'Fax:');
            return explode('--', str_replace($replace, "--", $node->text()));
        });

        for ($i=0; $i < count($values); $i++) { 
            for ($j=0; $j < count($values[$i]); $j++) { 
                if ($j == 0) {
                    $values[$i][$j] = str_replace('Objeto: ', "", $values[$i][$j]);
                }
            }
        }

        $domain = 'http://www.portal.scf.sebrae.com.br/licitante/';
        $title_page = "Sebrae";

        return view('sebrae', compact('origin', 'title', 'values', 'domain', 'title_page'));
    }//end sebrae

    //using Goutte and DomCrawler
    public function cnpq()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://www.cnpq.br/web/guest/licitacoes');

        $title = $crawler->filter('.licitacoes h4')->each(function(Crawler $node, $i) {
            return $node->text();
        });

        $object = $crawler->filter('.cont_licitacoes p')->each(function(Crawler $node, $i) {
            return str_replace("Objeto:", "", $node->text());
        });

        $starting_date = $crawler->filter('.data_licitacao span')->each(function(Crawler $node, $i) {
            return $node->text();
        });

        $link = $crawler->filter('.outro-doc a')->extract(array('href'));

        $domain = 'http://www.cnpq.br';

        return view('cnpq', compact('title', 'object', 'starting_date', 'link', 'domain'));
    }//end cnpq
}
