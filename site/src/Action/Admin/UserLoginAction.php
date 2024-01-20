<?php
namespace App\Action\Admin;

use Cake\Chronos\ChronosDate;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class UserLoginAction
{
	public function __invoke($request, $response, $args): ResponseInterface
	{
		$renderer = new PhpRenderer(TEMPLATES);
		$renderer->setLayout('layouts/auth.php');

		$renderer->addAttribute('now', ChronosDate::now());
		$renderer->addAttribute('version', time());

		if (empty($args)) {
			return $renderer->render($response, 'pages/admin/login.php', [
				'pageTitle' => 'Login',
				'pageDescription' => 'Login to the Spark Admin Panel',
				'pageSlug' => 'login',
			]);
		}
	}
}
