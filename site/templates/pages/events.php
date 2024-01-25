<?php

use Cake\Chronos\Chronos;

ray($events);
?>
<div class="flex flex-col justify-end flex-none bg-[url('/assets/images/spark-as-554608479.jpg')] bg-center bg-cover min-h-[550px] px-28 pb-20 text-spark-pink-100">
	<h2 class="text-6xl font-semibold tracking-tighter">Events</h2>
	<p class="text-lg">Events that empower, engage and entertain</p>
</div>
<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black py-16">
	<!-- PINNED EVENTS: FEATURED & TODAY'S EVENTS -->
	<div x-data="{ currentFeaturedEvent: 1, showFeaturedEvent: (featuredEventID) => $data.currentFeaturedEvent = featuredEventID }" class="flex flex-col overflow-hidden">
		<div class="whitespace-nowrap w-full transition ease-in-out duration-300 relative mb-4" :style="'transform: translateX(-' + (currentFeaturedEvent - 1) * 100.5 + '%)'">
			<?php foreach ($pinnedEvents as $index => $pinnedEvent) : ?>
				<div x-data="{ thisFeaturedEvent: <?= $index + 1 ?> }" class="inline-block tracking-tight w-full whitespace-normal">
					<div class="flex gap-8">
						<div class=" aspect-square h-64">
							<img src="/assets/images/image-1.jpg" alt="" class="w-full h-full rounded-xl bg-gray-50 object-cover" />
						</div>
						<div class="flex flex-col">
							<div class="flex mb-1">
								<?php if (isset($pinnedEvent['isPinned']) && $pinnedEvent['isPinned'] === true) : ?><div class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Featured Event</div><?php endif; ?>
								<?php if (Chronos::createFromFormat(Chronos::ATOM, $pinnedEvent['schedule']['dates']['start'])->isToday()) : ?><div class="bg-lime-500 text-lime-700 text-xs font-bold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-lime-800">TODAY</div><?php endif; ?>
								<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">In Person</div>
							</div>
							<div class="flex flex-col grow">
								<h4 class="font-semibold text-3xl text-courageous-plum"><?= $pinnedEvent['name'] ?></h4>
								<time class="text-courageous-plum-400 font-medium tracking-tighter"><?= Chronos::createFromFormat(Chronos::ATOM, $pinnedEvent['schedule']['dates']['start'])->format('l, F j, Y') ?></time>
								<p class="mt-4 leading-relaxed"><?= $pinnedEvent['description'] ?></p>
							</div>
							<div class="flex text-sm text-courageous-plum items-center border-t pt-4 border-courageous-plum-200">
								<div class="font-medium pe-4"><a href="/partner/<?= isset($pinnedEvent['organizer']['slug']) ? $pinnedEvent['organizer']['slug'] : '#' ?>"><?= $pinnedEvent['organizer']['name'] ?></a></div>
								<div class="border-courageous-plum-300 border-s px-4"><?= $pinnedEvent['venue']['region'] ?> Region</div>
								<div class="border-courageous-plum-300 border-s px-4 grow"><?php echo "{$pinnedEvent['venue']['address']['city']}" . ', ' . (key_exists($pinnedEvent['venue']['address']['state'], $states) ? $states[$pinnedEvent['venue']['address']['state']]['abbr'] : $pinnedEvent['venue']['address']['state']) ?></div>
								<a href="/event/<?= $pinnedEvent['slug'] ?>" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
									More info
									<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="flex space-x-3 rtl:space-x-reverse justify-center">
			<?php for ($n = 1; $n <= count($pinnedEvents); $n++) : ?>
				<button x-data="{ featuredEventID: <?= $n ?> }" type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Event <?= $n ?>" :class="currentFeaturedEvent == featuredEventID ? 'bg-spark-gold' : 'bg-courageous-plum hover:bg-courageous-plum-300'" :disabled="featuredEventID == currentFeaturedEvent || false" @click="console.log(featuredEventID); showFeaturedEvent(featuredEventID)"></button>
			<?php endfor; ?>
		</div>
	</div>

	<section x-data="{ showEventType: 'upcoming', showEvent: (eventType) => eventType == $data.showEventType || false }" class="mt-16 py-6 border-courageous-plum-200 border-t tracking-tight">
		<div class="flex justify-center my-6">
			<div class="inline-flex rounded-md shadow-sm" role="group">
				<button type="button" class="px-4 py-2 text-sm font-medium border-courageous-plum-400 border-s-2 border-y-2 rounded-s-lg focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-courageous-plum-500 focus:text-white" :class="showEventType == 'upcoming' ? 'bg-courageous-plum-500 text-spark-pink-100' : 'bg-transparent text-gray-900 hover:bg-courageous-plum-300 hover:text-white'" :disabled="showEventType == 'upcoming' || false" @click="showEventType='upcoming'">
					Upcoming Events
				</button>
				<button type="button" class="px-4 py-2 text-sm font-medium border-courageous-plum-400 border-x-2 border-y-2 rounded-e-lg focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-courageous-plum-500 focus:text-white" :class="showEventType == 'past' ? 'bg-courageous-plum-500 text-spark-pink-100' : 'bg-transparent text-gray-900 hover:bg-courageous-plum-300 hover:text-white'" :disabled="showEventType == 'past' || false" @click="showEventType='past'">
					Past Events
				</button>
			</div>
		</div>

		<div class="grid grid-cols-2 gap-8">
			<?php foreach($events['items'] as $event): ?>
			<?php $eventStart = Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['start']); ?>
			<div x-data="{ eventType: '<?= $event['type'] ?>' }" class="flex flex-col grow border border-gray-200 rounded-lg shadow overflow-hidden" x-show="showEvent(eventType)">
				<div class="bg-[url('/assets/images/image-1.jpg')] h-64 bg-cover p-4">
					<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">In Person</div>
				</div>
				<div class="flex items-start p-4 bg-white gap-4">
					<time class="flex flex-col-reverse justify-center"><span class="text-center text-md font-bold uppercase -mt-2 text-courageous-plum-300"><?= $eventStart->format('M') ?></span> <span class="text-center text-3xl font-bold"><?= $eventStart->format('d') ?></span></time>
					<div class="relative grow">
						<h4 class="text-lg font-semibold text-courageous-plum"><?= $event['name'] ?></h4>
						<time class="font-medium tracking-tighter"><?= $eventStart->format('l, F j, Y') ?></time>
						<p class="text-xs mt-1"><?php if (isset($event['venue']['name'])): ?><span class="pe-4"><?= $event['venue']['name'] ?></span><?php endif; ?> <?php if (isset($event['venue']['address']['city']) && isset($event['venue']['address']['state'])): ?><span class="ps-4 border-s"><?= $event['venue']['address']['city'] . ', ' . (key_exists($event['venue']['address']['state'], $states) ? $states[$event['venue']['address']['state']]['abbr'] : $event['venue']['address']['state']) ?></span><?php endif; ?></p>
						<a href="/event/<?= isset($event['slug']) ? $event['slug'] : '#' ?>" class="absolute bottom-0 right-0 w-fit inline-flex items-center px-4 py-2 text-xs font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>
