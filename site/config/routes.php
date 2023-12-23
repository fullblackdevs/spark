<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Action\API\GetConnectionsAction;
use App\Action\API\GetEventsAction;
use App\Action\API\GetPartnersAction;
use App\Action\API\GetResourcesAction;
use App\Action\API\PulseAction;
use App\Action\Page\HomeAction;

return function (App $app) {
	$app->get('[/]', HomeAction::class);

	$app->group('/api', function (RouteCollectorProxy $api) {
        $api->group('/v0', function(RouteCollectorProxy $api) {
			$api->get('/pulse', PulseAction::class);
			$api->get('/events', GetEventsAction::class);
			$api->get('/resources', GetResourcesAction::class);
			$api->get('/connections', GetConnectionsAction::class);
			$api->get('/partners', GetPartnersAction::class);
		});
	});

	return $app;
};
