<?php
namespace App\Module\Content\Traits;

trait GeographyDataTrait
{
	public function getStateAbbreviation(string $state): string
	{
		return $this->stateAbbreviation;
	}
}
