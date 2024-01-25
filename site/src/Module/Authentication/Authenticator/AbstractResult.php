<?php
namespace App\Module\Authentication\Authenticator;

abstract class AbstractResult implements ResultInterface
{
	protected array $data;
	protected ResultStatus $status;

	public function __construct(array $data, ResultStatus $status)
	{
		$this->data = $data;
		$this->status = $status;
	}

	public function getData(): array
	{
		return $this->data;
	}

	public function getStatus(): ResultStatus
	{
		return $this->status;
	}

	public function isValid(): bool
	{
		return $this->status === ResultStatus::SUCCESS;
	}

	public function isLoginRequest(): bool
	{
		return $this->status === ResultStatus::LOGIN_REQUEST;
	}

	public function isLoginAttempt(): bool
	{
		return $this->status === ResultStatus::LOGIN_ATTEMPT;
	}

	public function isLogoutRequest(): bool
	{
		return $this->status === ResultStatus::LOGOUT_REQUEST;
	}
}
