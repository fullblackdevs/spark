<?php

use App\Module\Content\Entity\Contributor;
use App\Module\Content\Entity\Post;
use App\Module\Content\Entity\Resource;
use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosDate; ?>
<div class="bg-[#FAF3F9] grow min-h-full *:px-8 md:*:px-28 text-black">
	<section class="flex flex-col bg-courageous-plum-100 relative gap-4 py-8 md:py-24 overflow-hidden">
		<div class="flex md:me-9 gap-4 items-center">

			<h2 class="grow border-b-8 border-spark-gold-700 pb-2 xl:w-2/5 md:self-end xl:self-center">
				<svg viewbox="0 0 360 80" class="font-display text-8xl w-full">
					<text y="75" textLength="360" lengthAdjust="spacingAndGlyphs" class="fill-courageous-plum tracking-tight uppercase">The Latest</text>
				</svg>
			</h2>

			<div class="hidden md:grid md:grid-cols-4 gap-2 shrink justify-stretch w-3/5">
				<div>
					<img class="max-h-full rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
				</div>
				<div>
					<img class="max-h-full rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
				</div>
				<div>
					<img class="max-h-full rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
				</div>
				<div>
					<img class="max-h-full rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
				</div>
			</div>
		</div>
		<?php if ($pinnedContent->count() >= 1) : ?>
			<div x-data="{ currentHomeItem: 1, changeHomeItem: (homeItemID) => $data.currentHomeItem = homeItemID }" class="flex flex-wrap md:flex-nowrap gap-4 md:gap-6">
				<?php $primaryPinnedItem = $pinnedContent->first(); ?>
				<?php if ($primaryPinnedItem instanceof Post || $primaryPinnedItem instanceof Resource) : ?>
					<div class="flex flex-col w-full md:w-2/3 border-2 border-courageous-200 rounded-xl shadow overflow-hidden relative h-[528px]" <?php if ($image = $primaryPinnedItem->getImageUrl()) : ?>style="background: url('<?= $image ?>') center / cover no-repeat;" <?php endif; ?>>
						<div class="flex flex-col justify-between grow h-64 p-4 bg-gradient-to-t from-courageous-plum-900">
							<!-- Content Badges -->
							<?php if (($contentBadges = $primaryPinnedItem->getContentBadges()) >= 1) : ?>
								<div class="flex justify-end">
									<?php foreach ($contentBadges as $contentBadge) : ?>
										<div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400 w-fit"><?= $contentBadge ?></div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<div class="flex flex-col p-2 md:p-4 relative">
								<h4 class="text-3xl md:text-4xl tracking-tighter font-semibold text-courageous-plum-100 md:w-4/5"><?= $primaryPinnedItem->getName() ?></h4>
								<?php if ($primaryPinnedItem instanceof Post && ($contributor = $primaryPinnedItem->getContributor()) instanceof Contributor) : ?>
									<div class="relative flex items-center gap-x-2 mt-2">
										<img src="<?= $contributor->getProfileImage() ?>" alt="" class="h-6 w-6 rounded-full bg-gray-50">
										<div class="text-sm leading-6">
											<p class="font-semibold text-courageous-plum-200">
												<?php if ($profile_url = $contributor->getUrl()) : ?><a href="<?= $profile_url ?>">
														<span class="absolute inset-0"></span>
													<?php endif; ?>
													<?= $contributor->getName() ?>
													<?php if ($profile_url) : ?></a><?php endif; ?>
											</p>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($postDate = $primaryPinnedItem->getDate()) : ?>
									<time class="text-xs text-spark-gold-200 mt-2"><?= $postDate ?></time>
								<?php endif; ?>
								<a href="<?= $primaryPinnedItem->getUrl() ?>" class="hidden absolute bottom-0 right-0 w-fit md:inline-flex items-center px-4 py-2 text-xs font-medium text-center border-2 border-courageous-plum-300 rounded-lg text-courageous-plum-300 focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 mb-4 me-2">
									Read more
									<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
									</svg>
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php $pinnedContent = $pinnedContent->skip(1); ?>
				<?php if ($pinnedContent->count() >= 1) : ?>
					<div class="grid grid-flow-col auto-cols-max md:flex md:flex-col md:w-1/3 md:h-[528px] overflow-x-scroll md:overflow-hidden">
						<div class="flex flex-col transition ease-in-out duration-300 relative gap-4" :style="'transform: translateY(-' + (currentHomeItem - 1) * (100 / <?= $pinnedContent->count() ?> + <?= (.0625 * ($pinnedContent->count() - 1)) ?>) + '%)'">
							<?php foreach ($pinnedContent as $index => $pinnedItem) : ?>
								<a href="<?= $pinnedItem->getUrl() ?>" x-data="{ thisHomeItem: <?= $index ?> }" class="flex flex-col border-2 border-spark-pink-400 rounded-xl shadow overflow-hidden md:h-64 h-48 aspect-square bg-[percentage:140%] bg-center bg-no-repeat relative md:shrink-0 transition-all duration-300 ease-in-out hover:bg-[percentage:150%] before:absolute before:size-full before:inset-0 before:bg-gradient-to-t before:from-courageous-plum-600" <?php if ($image = $pinnedItem->getImageUrl()) : ?>style="background-image: url('<?= $image ?>');"<?php endif; ?>>
									<div class="flex flex-col grow justify-between p-4 z-10">
										<!-- Content Badges -->
										<?php if (($contentBadges = $pinnedItem->getContentBadges()) >= 1) : ?>
											<div class="flex justify-end">
												<?php foreach ($contentBadges as $contentBadge) : ?>
													<div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400 w-fit"><?= $contentBadge ?></div>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>
										<div class="relative">
											<h4 class="text-lg font-semibold text-courageous-plum-100 tracking-tighter leading-tight"><?= $pinnedItem->getTitle() ?></h4>
											<?php if ($publishedDate = $pinnedItem->getDate()) : ?>
												<time class="text-xs text-courageous-plum-200"><?= $publishedDate ?></time>
											<?php endif; ?>
											<?php if ($location = $pinnedItem->getLocation()) : ?>
												<p class="hidden md:block text-xs mt-1 text-courageous-plum-200"><span class="pe-4"><?= "{$location['city']}, {$location['state']}" ?></p>
											<?php endif; ?>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
					<nav class="hidden md:flex md:flex-col space-y-3 rtl:space-x-reverse justify-center">
						<?php for ($n = 1; $n <= (($pinnedContent->count() % 2 == 0) ? $pinnedContent->count() : $pinnedContent->count() - 1); $n++) : ?>
							<button x-data="{ homeItemID: <?= $n ?> }" :class="currentHomeItem == homeItemID ? 'bg-spark-gold' : 'bg-courageous-plum hover:bg-courageous-plum-300'" :disabled="homeItemID == currentHomeItem || false" @click="console.log(homeItemID); changeHomeItem(homeItemID)" type="button" class="w-3 h-3 rounded-full bg-courageous-plum" aria-current="true" aria-label="Pinned Item <?= $n ?>"></button>
						<?php endfor; ?>
					</nav>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</section>
	<section class="flex flex-col md:flex-row bg-spark-pink relative items-center overflow-hidden py-10 md:py-16">
		<svg viewbox="0 0 360 150" class="font-display text-8xl relative z-10 md:w-2/5 w-full" xmlns="http://www.w3.org/2000/svg">
			<text x="0" y="70" lengthAdjust="spacingAndGlyphs" class="fill-none stroke-1 stroke-courageous-plum tracking-tight uppercase" textLength="360">Partner</text>
			<text x="0" y="145" textLength="360" lengthAdjust="spacingAndGlyphs" class="fill-courageous-plum tracking-tight uppercase">Spotlight</text>
		</svg>
		<div class="flex grow shrink-0 bg-slate-800 rounded-xl overflow-hidden md:h-80 w-full md:w-80 aspect-square place-self-center justify-stretch items-stretch relative z-40 mt-8 md:mt-0 md:ml-28 transition-all duration-300 ease-in-out bg-[url('/assets/images/otc-ahf.png')] bg-center bg-scalable hover:bg-scale-10 bg-no-repeat">
			<div class="flex flex-col justify-center items-center grow text-white">
				<div class="text-2xl">Logo</div>
				<div class="mt-10">Link</div>
			</div>
		</div>
		<svg viewbox="0 0 976 976" class="hidden md:block absolute -top-1/2 right-0 w-[976px] -mr-[45%] z-20">
			<defs>
				<radialGradient id="spotlight">
					<stop offset="0%" stop-color="#f7d6e9" />
					<stop offset="100%" stop-color="#fae5f1" />
				</radialGradient>
			</defs>
			<circle cy="488" cx="488" r="488" fill="url(#spotlight)" />
		</svg>
		<svg viewbox="0 0 1352 1352" class="hidden md:block absolute -top-3/4 right-0 w-[1352px] -mr-[55%]">
			<defs>
				<radialGradient id="spotlight">
					<stop offset="0%" stop-color="#f7d6e9" />
					<stop offset="100%" stop-color="#fae5f1" />
				</radialGradient>
			</defs>
			<circle cy="676" cx="676" r="676" fill="url(#spotlight)" />
		</svg>
	</section>
</div>
