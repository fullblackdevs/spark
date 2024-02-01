<?php
use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Action\API\GetConnectionsAction;
use App\Action\API\GetEventsAction;
use App\Action\API\GetPartnersAction;
use App\Action\API\GetResourcesAction;
use App\Action\API\PulseAction;
use App\Action\GetEventPageAction;
use App\Action\GetPartnerPageAction;
use App\Action\Page\AboutAction;
use App\Action\Page\BlogAction;
use App\Action\Page\ConnectAction;
use App\Action\Page\EventsAction;
use App\Action\GetResourcePageAction;
use App\Action\Page\HomeAction;
use App\Action\Page\PartnersAction;
use App\Action\Page\ResourcesAction;
use App\Middleware\UserAuthenticationMiddleware;
use App\Module\Content\Action\ViewContributorAction;
use App\Module\Content\Action\ViewPostAction;
use App\Module\User\Action\DashboardViewAction;
use App\Module\User\Action\LoginAction;
use App\Module\User\Action\LogoutAction;

return function (App $app) {
	$app->get('[/]', HomeAction::class);
	$app->get('/about', AboutAction::class);
	$app->get('/partners', PartnersAction::class);
	$app->get('/events', EventsAction::class);
	$app->get('/resources', ResourcesAction::class);
	$app->get('/blog', BlogAction::class);
	$app->get('/connect', ConnectAction::class);

	$app->get('/resource/{slug}', GetResourcePageAction::class);
	$app->get('/partner/{id}/resource/{slug}', GetResourcePageAction::class);
	$app->get('/event/{slug}', GetEventPageAction::class);
	$app->get('/partner/{slug}', GetPartnerPageAction::class);

	$app->get('/blog/{slug}', ViewPostAction::class);

	$app->get('/contributor/{slug}', ViewContributorAction::class);

	$app->group('/admin', function (RouteCollectorProxy $admin) {
		$admin->get('[/]', DashboardViewAction::class)->setName('user.dashboard');
		$admin->get('/login', LoginAction::class)->setName('user.login');
		$admin->post('/login', LoginAction::class)->setName('user.login@authenticate');
		$admin->get('/logout', LogoutAction::class)->setName('user.logout');
	})->add(UserAuthenticationMiddleware::class);

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
