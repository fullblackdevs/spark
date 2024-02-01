<div class="flex flex-col justify-end relative min-h-96 text-spark-pink-100 bg-center bg-cover bg-no-repeat before:content-['\00a0'] before:bg-gradient-to-t before:from-courageous-plum-800 before:absolute before:size-full" <?php if ($image = $resource->getImageUrl()) : ?>style="background-image: url('<?= $image ?>');"<?php endif; ?>>
	<div class="flex flex-col size-full px-28 pb-24 z-10">
		<div class="flex mb-2">
			<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Resource</div>
		</div>
		<h2 class="text-6xl font-semibold tracking-tighter"><?= $resource->getTitle() ?></h2>
		<dl class="text-spark-gold-200">
			<dt class="sr-only">Provider</dt>
			<dd class="text-2xl font-medium tracking-tighter"><?= $resource->getPartner()->getName() ?></dd>
		</dl>
	</div>
</div>

<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black pt-16 tracking-tight z-10">
	<div class="flex gap-16 -mt-32 bg-[#FAF3F9] p-10 rounded-t-lg">
		<section class="w-3/5">
			<h3 class="text-3xl font-bold text-courageous-plum">The Details</h3>
			<p class="mt-6 leading-loose"><?= $resource->getFullDescription() ?></p>
		</section>

		<aside class="w-2/5 h-fit mt-2 flex flex-col divide-y grow-0 overflow-hidden rounded-md bg-white shadow">
			<div class="px-6 py-4">Program/Service Logo</div>
			<div class="flex justify-between px-6 py-4">
				<h4>Location</h4>
				<p class="text-right">
					<?php //$resource['partner']['address']['street'] ?><br />
					<?php //$resource['partner']['address']['city'] . ', ' . $resource['partner']['address']['state'] . ' ' . $resource['partner']['address']['zip'] ?>
				</p>
			</div>
			<?php if ($resource->getSchedule()) : ?>
				<div class="flex justify-between px-6 py-4">
					<h4>Schedule</h4>
					<dl>
						<dt>Monday</dt>
						<dd>9:00 AM - 5:00 PM</dd>
						<dt>Tuesday</dt>
						<dd>9:00 AM - 5:00 PM</dd>
					</dl>
				</div>
			<?php endif; ?>

			<?php if ($resource->getPartner()->getWebsite()) : ?>
				<div class="flex justify-between px-6">
					<h4>Website</h4>
					<p><a href="https://<?= $resource->getPartner()->getWebsite() ?>"><?= $resource->getPartner()->getWebsite() ?></a></p>
				</div>
			<?php endif; ?>

			<div class="flex justify-between px-6 py-4">
				<h4>Socials</h4>
				<ul class="flex justify-between items-center gap-4">
					<li>
						<a href="https://www.facebook.com/sparktheconvo/" target="_blank" class="text-blue hover:text-[#CFAE70]">
							<svg class="h-6" fill="currentColor" viewBox="0 0 50 50" aria-hidden="true">
								<path d="M32,11h5c0.552,0,1-0.448,1-1V3.263c0-0.524-0.403-0.96-0.925-0.997C35.484,2.153,32.376,2,30.141,2C24,2,20,5.68,20,12.368 V19h-7c-0.552,0-1,0.448-1,1v7c0,0.552,0.448,1,1,1h7v19c0,0.552,0.448,1,1,1h7c0.552,0,1-0.448,1-1V28h7.222 c0.51,0,0.938-0.383,0.994-0.89l0.778-7C38.06,19.518,37.596,19,37,19h-8v-5C29,12.343,30.343,11,32,11z" />
							</svg>
							<span class="sr-only">Facebook</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/sparktheconvo/" target="_blank" class="text-blue hover:text-[#CFAE70]">
							<svg class="h-6" fill="currentColor" viewBox="0 0 50 50" aria-hidden="true">
								<path d="M 6.9199219 6 L 21.136719 26.726562 L 6.2285156 44 L 9.40625 44 L 22.544922 28.777344 L 32.986328 44 L 43 44 L 28.123047 22.3125 L 42.203125 6 L 39.027344 6 L 26.716797 20.261719 L 16.933594 6 L 6.9199219 6 z" />
							</svg>
							<span class="sr-only">X (formerly Twitter)</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/sparktheconvo/" target="_blank" class="text-blue hover:text-[#CFAE70]">
							<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 50 50" aria-hidden="true">
								<path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
							</svg>
							<span class="sr-only">Instagram</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/sparktheconvo/" target="_blank" class="text-blue hover:text-[#CFAE70]">
							<svg class="h-6" fill="currentColor" viewBox="0 0 65 47" aria-hidden="true">
								<path d="M57.61,7.56c-.55-3.02-3.16-5.23-6.19-5.91-4.53-.96-12.92-1.65-22-1.65S11.83.69,7.29,1.65c-3.02.69-5.64,2.75-6.19,5.91-.55,3.44-1.1,8.25-1.1,14.44s.55,11,1.24,14.44c.55,3.02,3.16,5.23,6.19,5.91,4.81.96,13.06,1.65,22.14,1.65s17.33-.69,22.14-1.65c3.02-.69,5.63-2.75,6.19-5.91.55-3.44,1.24-8.39,1.38-14.44-.28-6.19-.97-11-1.65-14.44ZM22,31.62V12.38l16.77,9.62-16.77,9.62Z" />
							</svg>
							<span class="sr-only">YouTube</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="px-6 py-4 flex flex-wrap gap-3">
				<span class="inline-flex items-center gap-x-1.5 rounded-full bg-gray-100 px-2 py-1 text-sm font-medium text-gray-600">
					<svg class="h-1.5 w-1.5 fill-gray-400" viewBox="0 0 6 6" aria-hidden="true">
						<circle cx="3" cy="3" r="3" />
					</svg>
					Healthcare
				</span>
				<span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-sm font-medium text-red-700">
					<svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
						<circle cx="3" cy="3" r="3" />
					</svg>
					Fitness
				</span>
				<span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-sm font-medium text-red-700">
					<svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
						<circle cx="3" cy="3" r="3" />
					</svg>
					Violence
				</span>
				<span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-sm font-medium text-red-700">
					<svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
						<circle cx="3" cy="3" r="3" />
					</svg>
					Nutrition
				</span>
				<span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-2 py-1 text-sm font-medium text-red-700">
					<svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
						<circle cx="3" cy="3" r="3" />
					</svg>
					Motherhood
				</span>
			</div>
		</aside>
	</div>
</div>
