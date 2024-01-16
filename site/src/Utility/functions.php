<?php
function env(string $key, string|float|int|bool|null $default = null) : string|float|int|bool|null
{
	$key = strtoupper($key);

	if (isset($_ENV[$key])) {
		return $_ENV[$key];
	}

	return $default;
}
