<?php

use Cake\Chronos\Chronos;
use Faker\Factory as Faker;

$fake = Faker::create();
?>
<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black py-16">
	<div class="grid grid-cols-8 auto-rows-auto overflow-hidden w-full mb-4 gap-8">
		<?php foreach ($posts as $index => $post) : ?>
			<?php if (isset($post['format'])) : ?>
				<?php if ($post['format'] === 'article-lg') : ?>
					<div class="grid grid-cols-subgrid tracking-tight bg-white rounded-xl col-span-8 gap-0 items-stretch">
						<div class="col-span-2">
							<!-- FEATURED IMAGE -->
							<?php if (isset($post['media']['images']['featured'])) : ?>
								<img src="/assets/images/<?= $post['media']['images']['featured']['file'] ?>" alt="" class="size-full rounded-s-xl bg-gray-50 object-cover object-center" />
							<?php endif; ?>
						</div>
						<div class="col-span-6 m-6 relative">
							<div class="flex mb-1 justify-end absolute top-0 right-0">
								<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
							</div>
							<div class="flex flex-col justify-between h-full">
								<h4 class="font-semibold text-3xl text-courageous-plum"><?= $post['name'] ?></h4>
								<time class="text-courageous-plum-400 font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $post['date'])->format('l, F j, Y') ?></time>
								<p class="mt-4 leading-relaxed grow h-max"><?= $post['description'] ?></p>
								<footer class="flex justify-between items-center mt-2">
									<p class="text-sm"><?= $post['contributor']['name'] ?></p>
									<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
										Read More
										<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
											<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
										</svg>
									</a>
								</footer>
							</div>
						</div>
					</div>
				<?php elseif ($post['format'] === 'video') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-5 gap-0 items-stretch overflow-hidden p-6 min-h-72" <?php if (isset($post['media']['images']['featured'])) : ?>style="background: url('/assets/images/<?= $post['media']['images']['featured']['file'] ?>') center / cover no-repeat;" <?php endif; ?>>
						<div class="flex flex-col justify-between h-full">
							<div><!-- CARD LABELS -->
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
							</div>
							<div class="text-courageous-plum-200"><!-- CARD CONTENT -->
								<h4 class="font-semibold text-3xl"><?= $post['title'] ?></h4>
								<time class="font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $post['date'])->format('l, F j, Y') ?></time>
								<footer class="flex justify-end items-center mt-2">
									<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
										Watch Now
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 22" fill="currentColor" class="w-3.5 h-3.5 ms-2" aria-hidden="true">
											<path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm14.024-.983a1.125 1.125 0 0 1 0 1.966l-5.603 3.113A1.125 1.125 0 0 1 9 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113Z" clip-rule="evenodd" />
										</svg>
									</a>
								</footer>
							</div>
						</div>
					</div>
				<?php elseif ($post['format'] === 'publication') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-3 row-span-2 gap-0 items-stretch overflow-hidden bg-[url('/assets/images/christina-wocintechchat-com-jzonFmreWok-unsplash.jpg')] bg-cover">
						<div class="flex flex-col justify-between p-6 h-full">
							<div><!-- CARD LABELS -->
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
							</div>
							<div class="flex flex-col justify-end text-courageous-plum-200"><!-- CARD CONTENT -->
								<h4 class="font-semibold text-3xl"><?= $post['name'] ?></h4>
								<?php if (isset($post['titles']['subtitle'])) : ?><p class="font-medium tracking-tighter"><?= $post['titles']['subtitle'] ?></p><?php endif; ?>
								<footer class="flex justify-end items-center mt-2">
									<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
										Read More
										<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
											<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
										</svg>
									</a>
								</footer>
							</div>
						</div>
					</div>
				<?php elseif ($post['format'] === 'article-sm') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-3 gap-0 items-stretch overflow-hidden">
						<div class="p-6">
							<div class="flex flex-col justify-between">
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
								<h4 class="font-semibold text-3xl text-courageous-plum"><?= $post['name'] ?></h4>
								<time class="text-courageous-plum-400 font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $post['date'])->format('l, F j, Y') ?></time>
								<?php if (isset($post['description']['excerpt'])) : ?><p class="mt-4 leading-relaxed grow h-max"><?= $post['description']['excerpt'] ?></p><?php endif; ?>
								<footer class="flex justify-between items-center mt-2">
									<p class="text-sm"><?= $post['contributor']['name'] ?></p>
									<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
										Read More
										<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
											<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
										</svg>
									</a>
								</footer>
							</div>
						</div>
					</div>
				<?php elseif ($post['format'] === 'article-md') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-4 gap-0 items-stretch overflow-hidden">
						<div class="flex flex-col justify-between p-6 h-full">
							<div class="flex mb-1 justify-end">
								<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
							</div>
							<h4 class="font-semibold text-3xl text-courageous-plum"><?= $post['title'] ?></h4>
							<div class="relative flex items-center gap-x-3 mt-2">
								<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-8 w-8 rounded-full bg-gray-50">
								<div class="text-sm leading-6">
									<p class="font-semibold text-gray-900">
										<a href="#">
											<span class="absolute inset-0"></span>
											Jean Gray
										</a>
									</p>
								</div>
							</div>
							<?php if (isset($post['description']['full'])) : ?><p class="mt-4 leading-relaxed grow h-max"><?= $post['description']['full'] ?></p><?php endif; ?>
							<footer class="flex justify-between items-center mt-2">
								<time class="text-sm text-courageous-plum-400 font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $post['date'])->format('l, F j, Y') ?></time>
								<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
									Read More
									<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
									</svg>
								</a>
							</footer>
						</div>
					</div>
				<?php elseif ($post['format'] === 'social') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-2 items-stretch overflow-hidden relative" <?php if (isset($post['media']['images']['primary'])) : ?>style="background: url('/assets/images/<?= $post['media']['images']['primary']['file'] ?>') center / cover no-repeat;" <?php endif; ?>>
						<div class="flex flex-col justify-between p-6 h-full">
							<div><!-- CONTENT BADGES -->
								<div class="flex mb-1 justify-end gap-2">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
							</div>
							<div class="text-courageous-plum-200"><!-- CONTENT -->
								<time class="font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $post['date'])->format('l, F j, Y') ?></time>
								<p class="text-sm"><?= $post['contributor']['name'] ?></p>
								<a href="/event/<?= $post['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
									View on Instagram
								</a>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
