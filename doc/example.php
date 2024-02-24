<?php

require __DIR__.'/../vendor/autoload.php';

use GuzzleHttp\Client;
use Elminson\YahooFinanceApi\ApiClient;
use Elminson\YahooFinanceApi\ApiClientFactory;

// Create a new client from the factory
$client = ApiClientFactory::createApiClient();

// Or use your own Guzzle client and pass it in
$options = [/* ... */];
$guzzleClient = new Client($options);
$client = ApiClientFactory::createApiClient($guzzleClient);

// Returns an array of Elminson\YahooFinanceApi\Results\SearchResult
$searchResult = $client->search('Apple');

// Returns an array of Elminson\YahooFinanceApi\Results\HistoricalData
$historicalData = $client->getHistoricalData('AAPL', ApiClient::INTERVAL_1_DAY, new DateTime('-14 days'), new DateTime('today'));

// Returns Elminson\YahooFinanceApi\Results\Quote
$exchangeRate = $client->getExchangeRate('USD', 'EUR');

// Returns an array of Elminson\YahooFinanceApi\Results\Quote
$exchangeRates = $client->getExchangeRates([
    ['USD', 'EUR'],
    ['EUR', 'USD'],
]);

// Returns Elminson\YahooFinanceApi\Results\Quote
$quote = $client->getQuote('AAPL');

// Returns an array of Elminson\YahooFinanceApi\Results\Quote
$quotes = $client->getQuotes(['AAPL', 'GOOG']);
