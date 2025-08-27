<?php
use OpenTelemetry\API\Globals;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

static $counter;

$app = AppFactory::create();
$meter = Globals::meterProvider()->getMeter('typo3-demo');
$counter = $meter->createCounter("t3-dices", "dice", "number rolled on a W6 dice");

$app->get('/rolldice', function (Request $request, Response $response) use ($counter) {
    $result = random_int(1,6);
    $counter->add(1, ['dice_result' => $result]);
    $response->getBody()->write(strval($result));
    return $response;
});

$app->run();
