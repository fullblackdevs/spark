<div class="flex flex-col justify-end flex-none bg-[url('/assets/images/spark-as-666100981.jpg')] bg-center bg-cover min-h-[550px] px-28 pb-20 text-spark-pink-100">
	<h2 class="text-6xl font-semibold tracking-tighter">Partners</h2>
	<p class="text-lg">Spark connects organizations supporting women with the resources they need to succeed</p>
</div>
<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black py-16">
	<section class="grid grid-cols-3 gap-8 text-base">
		<?php foreach ($partners as $partner) : ?>
			<div class="flex flex-col max-w-sm bg-white border border-gray-200 rounded-lg shadow">
				<a href="#" class="h-[150px] overflow-hidden">
					<img class="rounded-t-lg" src="/assets/images/image-1.jpg" alt="" />
				</a>
				<div class="grow flex flex-col p-5">
					<a href="#">
						<h4 class="mb-2 text-2xl font-bold tracking-tight text-courageous-plum-900"><?= $partner['name'] ?></h4>
					</a>
					<p class="grow mb-3 font-normal text-courageous-plum-700 text-sm leading-relaxed"><?= $partner['mission'] ?></p>
					<a href="/partner/<?= $partner['slug'] ?>" class="w-fit inline-flex items-center px-3 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400">
						Learn more
						<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
						</svg>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
</div>
