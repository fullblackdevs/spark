<?php
namespace App\Action\Page;

use App\Repository\PartnersRepository;
use App\Repository\RepositoryInterface;

class PartnersAction extends CoreAction
{
	private PartnersRepository $Partners;

	public function invoke() : void
	{
		$this->Partners = new PartnersRepository();
		$partners = $this->Partners->getPartners();

		$this->getView()->render($this->getResponse(), 'pages/partners.php', [
			'pageTitle' => 'Partners',
			'pageDescription' => 'Spark connects organizations supporting women with the resources they need to succeed.',
			'pageSlug' => 'partners',
			'partners' => $partners,
		]);
	}
}
