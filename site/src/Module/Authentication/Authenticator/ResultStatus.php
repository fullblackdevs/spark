<?php
namespace App\Module\Authentication\Authenticator;

enum ResultStatus
{
	case SUCCESS;
	case FAILURE;
	case LOGIN_REQUEST;
	case LOGIN_ATTEMPT;
	case LOGOUT_REQUEST;
}
