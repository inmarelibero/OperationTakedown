<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
//$app['debug'] = true;

/***********************************************************************************************
 * Register providers
 **********************************************************************************************/
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__.'/../config/config.yml'));

/***********************************************************************************************
 * Services
 **********************************************************************************************/
/**
 * Return the correct headers to send to the client when your site is under maintenance
 */
$app['get_response_headers'] = $app->share(function () use ($app) {
	$headers = array();

	// set "Retry-after" header
	if ($app['config']['retry_after']['enabled'] == true) {
		$headers = array_merge($headers, array(
			"Retry-After" => $app['config']['retry_after']['seconds']
		));
	}

	return $headers;
});

/***********************************************************************************************
 * Universal url matcher
 **********************************************************************************************/
/**
 * Return a 503 HTTP Status Code for every request
 */
$app->match('/{url}', function (Request $request) use ($app) {

	// if request url ends with ".json", return a Json response
	if (preg_match("#\.json$#", $request->getPathInfo())) {
		return new Symfony\Component\HttpFoundation\JsonResponse(array(), 503, $app['get_response_headers']);
	}

	// if request url ends with ".xml", return a XML response
	elseif (preg_match("#\.xml$#", $request->getPathInfo())) {
		return new Symfony\Component\HttpFoundation\Response('<?xml version="1.0" encoding="UTF-8" ?><root></root>', 503, $app['get_response_headers']);
	}

	// default response content type: HTML
	return new Symfony\Component\HttpFoundation\Response($app['twig']->render('index.html.twig'), 503, $app['get_response_headers']);

})->assert('url', '.*');

$app->run();