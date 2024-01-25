<?php
namespace App\Module\Authentication\Authenticator;

interface ResultInterface
{
	public function isValid(): bool;
}
