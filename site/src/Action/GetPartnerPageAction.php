<?php
namespace App\Action;

use App\Action\Page\CoreAction;
use App\Repository\PartnersRepository;
use Cake\Chronos\ChronosDate;

class GetPartnerPageAction extends CoreAction
{
	private PartnersRepository $Partners;

	public function invoke() : void
	{
		$this->Partners = new PartnersRepository();

		$today = ChronosDate::today();
		$id = $this->getRequest()->getAttribute('slug');
		$partner = $this->Partners->getPartner($id);

		ray($id);

		$this->getView()->render($this->getResponse(), 'pages/partner.php', [
			'partner' => $partner,
			'pageSlug' => 'partners',
			'isSinglePage' => true,
		]);
	}
}
