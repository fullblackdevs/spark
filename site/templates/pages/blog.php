<?php

use Cake\Chronos\Chronos;
use Faker\Factory as Faker;

$fake = Faker::create();

$posts = [
	[
		"name" => "How to Find a Therapist",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => $fake->paragraphs(1, true),
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "article",
		'slug' => 'how-to-find-a-therapist',
		'format' => 'article-lg',
	],
	[
		"name" => "Spark Rings in the New Year with a New Look",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "video",
		'slug' => 'how-to-find-a-therapist',
		'size' => 'col-span-5 aspect-video',
		'format' => 'video',
	],
	[
		"name" => "2024 Resolutions",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "newsletter",
		'slug' => 'how-to-find-a-therapist',
		'size' => 'col-span-3 row-span-2 h-auto',
		'format' => 'publication',
	],
	[
		"name" => "Spark Rings in the New Year with a New Look",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "article",
		'slug' => 'how-to-find-a-therapist',
		'format' => 'article-sm'
	],
	[
		"name" => "Spark Rings in the New Year with a New Look",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "instagram",
		'slug' => 'how-to-find-a-therapist',
		'format' => 'social'
	],
	[
		"name" => "Spark Rings in the New Year with a New Look",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "video",
		'slug' => 'how-to-find-a-therapist',
		'format' => 'article-md'
	],
	[
		"name" => "Spark Rings in the New Year with a New Look",
		"date" => "2021-09-01T00:00:00+00:00",
		'description' => "Finding a therapist can be a daunting task. Here are some tips to help you find the right therapist for you.",
		'contributor' => [
			'name' => 'Spark Staff Writer',
			'slug' => 'spark',
		],
		"type" => "video",
		'slug' => 'how-to-find-a-therapist',
		'format' => 'article-md'
	],
];
?>
<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black py-16">
	<div class="grid grid-cols-8 auto-rows-auto overflow-hidden w-full mb-4 gap-8">
		<?php foreach ($posts as $index => $post) : ?>
			<?php if (isset($post['format'])) : ?>
				<?php if ($post['format'] === 'article-lg') : ?>
					<div class="grid grid-cols-subgrid tracking-tight bg-white rounded-xl col-span-8 gap-0 items-stretch">
						<div class="col-span-2">
							<!-- FEATURED IMAGE -->
							<img src="/assets/images/image-1.jpg" alt="" class="size-full rounded-s-xl bg-gray-50 object-cover object-center" />
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
					<div class="tracking-tight bg-white rounded-xl col-span-5 gap-0 items-stretch overflow-hidden p-6 relative bg-[url('/assets/images/thought-catalog-23KdVfc395A-unsplash.jpg')] bg-cover">
						<div class="flex flex-col justify-between">
							<div class="flex mb-1 justify-end">
								<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
							</div>
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
				<?php elseif ($post['format'] === 'publication') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-3 row-span-2 gap-0 items-stretch overflow-hidden">
						<div class="p-6 bg-none">
							<div class="flex flex-col justify-between">
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
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
				<?php elseif ($post['format'] === 'article-sm') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-3 gap-0 items-stretch overflow-hidden">
						<div class="p-6">
							<div class="flex flex-col justify-between">
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
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
					<?php elseif ($post['format'] === 'article-md') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-4 gap-0 items-stretch overflow-hidden">
						<div class="p-6">
							<div class="flex flex-col justify-between">
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
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
					<?php elseif ($post['format'] === 'social') : ?>
					<div class="tracking-tight bg-white rounded-xl col-span-2 items-stretch overflow-hidden relative bg-[url('/assets/images/thought-catalog-23KdVfc395A-unsplash.jpg')] bg-cover">
						<div class="p-6">
							<div class="flex flex-col justify-between">
								<div class="flex mb-1 justify-end">
									<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400"><?= ucwords($post['type']) ?></div>
								</div>
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
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
