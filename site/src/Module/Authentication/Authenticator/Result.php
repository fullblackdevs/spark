<?php
namespace App\Module\Authentication\Authenticator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\Psr17\GuzzlePsr17Factory;

final class Result extends AbstractResult implements ResultInterface {}
