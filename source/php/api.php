<?php


use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nyholm\Psr7\Factory\Psr17Factory;

require 'vendor/autoload.php';
// $psr17Factory = new Psr17Factory();
// AppFactory::setResponseFactory($psr17Factory);

$app = AppFactory::create();

// API endpoint
$app->post('/calculate-rates', function (Request $request, Response $response) {
    $data = $request->getParsedBody();

    // Mutate payload to match remote API format
    $mutatedPayload = [
        "Unit Type ID" => -2147483637, // Replace with actual Unit Type ID
        "Arrival" => date("Y-m-d", strtotime($data['Arrival'])),
        "Departure" => date("Y-m-d", strtotime($data['Departure'])),
        "Guests" => array_fill(0, $data['Occupants'], ["Age Group" => "Adult"])
    ];

    // Send POST request to remote API
    $client = new GuzzleHttp\Client();
    $remoteApiUrl = "https://dev.gondwana-collection.com/Web-Store/Rates/Rates.php";
    $response = $client->post($remoteApiUrl, [
        'json' => $mutatedPayload
    ]);

    $rates = json_decode($response->getBody(), true);

    // Return rates to frontend
    return $response->withJson($rates);
});

$app->run();
