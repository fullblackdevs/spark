<div class="bg-[#FAF3F9] grow min-h-full px-28 text-black py-16">
	<div x-data="{ currentFeaturedEvent: 1, showFeaturedEvent: (featuredEventID) => $data.currentFeaturedEvent = featuredEventID }" class="flex flex-col overflow-x-hidden">
		<div class="flex shrink-0">
			<div x-data="{ thisFeaturedEvent: 1 }" class="flex tracking-tight gap-8 mb-4" x-show="currentFeaturedEvent == thisFeaturedEvent || false" x-transition:enter=" transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
				<div class=" aspect-square h-64">
					<img src="/assets/images/image-1.jpg" alt="" class="w-full h-full rounded-xl bg-gray-50 object-cover" />
				</div>
				<div class="flex flex-col">
					<div class="flex mb-1">
						<div class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Featured Event</div>
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">In Person</div>
					</div>
					<div class="flex flex-col grow">
						<h4 class="font-semibold text-3xl text-courageous-plum">We the People National March</h4>
						<time class="text-courageous-plum-400 font-medium tracking-tighter">Sunday, July 2, 2023</time>
						<p class="mt-4 leading-relaxed">Close to 1,000 bills are being introduced across the country that undermine basic human rights. The We the People Coalition is fighting back. Join us for the We The People March in Fort Lauderdale, FL, on July 2nd to protect our democracy.</p>
					</div>
					<div class="flex text-sm text-courageous-plum items-center border-t pt-4 border-courageous-plum-200">
						<div class="font-medium pe-4">AIDS Healthcare Foundation</div>
						<div class="border-courageous-plum-300 border-s px-4">Southern Region</div>
						<div class="border-courageous-plum-300 border-s px-4 grow">Ft. Lauderdale, FL</div>
						<a href="/event/we-the-people" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>

			<div x-data="{ thisFeaturedEvent: 2 }" class="flex tracking-tight gap-8 mb-4" x-show="currentFeaturedEvent == thisFeaturedEvent || false" x-transition:enter=" transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
				<div class=" aspect-square h-64">
					<img src="/assets/images/image-1.jpg" alt="" class="w-full h-full rounded-xl bg-gray-50 object-cover" />
				</div>
				<div class="flex flex-col">
					<div class="flex mb-1">
						<div class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Featured Event</div>
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">In Person</div>
					</div>
					<div class="flex flex-col grow">
						<h4 class="font-semibold text-3xl text-courageous-plum">AIDS is a Civil Rights Issue</h4>
						<time class="text-courageous-plum-400 font-medium tracking-tighter">Monday, January 15, 2024</time>
						<p class="mt-4 leading-relaxed">This is a big event.</p>
					</div>
					<div class="flex text-sm text-courageous-plum items-center border-t pt-4 border-courageous-plum-200">
						<div class="font-medium pe-4">AIDS Healthcare Foundation</div>
						<div class="border-courageous-plum-300 border-s px-4">Southern Region</div>
						<div class="border-courageous-plum-300 border-s px-4 grow">Atlanta, GA</div>
						<a href="/event/we-the-people" class="w-fit inline-flex items-center px-4 py-2 text-sm font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="flex space-x-3 rtl:space-x-reverse justify-center">
			<button x-data="{ featuredEventID: 1 }" type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" :class="currentFeaturedEvent == featuredEventID ? 'bg-spark-gold' : 'bg-courageous-plum hover:bg-courageous-plum-300'" :disabled="featuredEventID == currentFeaturedEvent || false" @click="console.log(featuredEventID); showFeaturedEvent(featuredEventID)"></button>
			<button x-data="{ featuredEventID: 2 }" type="button" class="w-3 h-3 rounded-full bg-courageous-plum" aria-current="false" aria-label="Slide 2" :class="currentFeaturedEvent == featuredEventID ? 'bg-spark-gold' : 'bg-courageous-plum hover:bg-courageous-plum-300'" :disabled="featuredEventID == currentFeaturedEvent || false" @click="console.log(featuredEventID); showFeaturedEvent(featuredEventID)"></button>
			<button x-data="{ featuredEventID: 3 }" type="button" class="w-3 h-3 rounded-full bg-courageous-plum" aria-current="false" aria-label="Slide 3" :class="currentFeaturedEvent == featuredEventID ? 'bg-spark-gold' : 'bg-courageous-plum hover:bg-courageous-plum-300'" :disabled="featuredEventID == currentFeaturedEvent || false" @click="console.log(featuredEventID); showFeaturedEvent(featuredEventID)"></button>
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
			<div x-data="{ eventType: 'past' }" class="flex flex-col grow border border-gray-200 rounded-lg shadow overflow-hidden" x-show="showEvent(eventType)">
				<div class="bg-[url('/assets/images/image-1.jpg')] h-64 bg-cover p-4">
					<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">In Person</div>
				</div>
				<div class="flex items-start p-4 bg-white gap-4">
					<time class="flex flex-col-reverse justify-center"><span class="text-center text-md font-bold uppercase -mt-2 text-courageous-plum-300">Dec</span> <span class="text-center text-3xl font-bold">01</span></time>
					<div class="relative grow">
						<h4 class="text-lg font-semibold text-courageous-plum">Janet Jackson: World AIDS Day Concert</h4>
						<time class="font-medium tracking-tighter">Friday, December 1, 2023</time>
						<p class="text-xs mt-1"><span class="pe-4">NRG Arena</span> <span class="ps-4 border-s">Houston, TX</span></p>
						<a href="/event/we-the-people" class="absolute bottom-0 right-0 w-fit inline-flex items-center px-4 py-2 text-xs font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div x-data="{ eventType: 'past' }" class="flex flex-col grow border border-gray-200 rounded-lg shadow overflow-hidden" x-show="showEvent(eventType)">
				<div class="bg-[url('/assets/images/image-1.jpg')] h-64 bg-cover p-4">
					<div class="flex">
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">Virtual</div>
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">Ongoing</div>
					</div>
				</div>
				<div class="flex items-start p-4 bg-white gap-4">
					<time class="flex flex-col-reverse justify-center"><span class="text-center text-md font-bold uppercase -mt-2 text-courageous-plum-300">Dec</span> <span class="text-center text-3xl font-bold">06</span></time>
					<div class="relative grow">
						<h4 class="text-lg font-semibold text-courageous-plum">Radiant Minds, Vibrant Lives Support Group</h4>
						<time class="font-medium tracking-tighter">Wednesday, December 6, 2023</time>
						<p class="text-xs mt-1"><span class="pe-4">Zoom</span></p>
						<a href="/event/we-the-people" class="absolute bottom-0 right-0 w-fit inline-flex items-center px-4 py-2 text-xs font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div x-data="{ eventType: 'past' }" class="flex flex-col grow border border-gray-200 rounded-lg shadow overflow-hidden" x-show="showEvent(eventType)">
				<div class="bg-[url('/assets/images/image-1.jpg')] h-64 bg-cover p-4">
					<div class="flex">
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">Virtual</div>
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">Ongoing</div>
					</div>
				</div>
				<div class="flex items-start p-4 bg-white gap-4">
					<time class="flex flex-col-reverse justify-center"><span class="text-center text-md font-bold uppercase -mt-2 text-courageous-plum-300">Dec</span> <span class="text-center text-3xl font-bold">13</span></time>
					<div class="relative grow">
						<h4 class="text-lg font-semibold text-courageous-plum">Radiant Minds, Vibrant Lives Support Group</h4>
						<time class="font-medium tracking-tighter">Wednesday, December 13, 2023</time>
						<p class="text-xs mt-1"><span class="pe-4">Zoom</span></p>
						<a href="/event/we-the-people" class="absolute bottom-0 right-0 w-fit inline-flex items-center px-4 py-2 text-xs font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div x-data="{ eventType: 'upcoming' }" class="flex flex-col grow border border-gray-200 rounded-lg shadow overflow-hidden" x-show="showEvent(eventType)">
				<div class="bg-[url('/assets/images/image-1.jpg')] h-64 bg-cover p-4">
					<div class="flex">
						<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 w-fit">In Person</div>
					</div>
				</div>
				<div class="flex items-start p-4 bg-white gap-4">
					<time class="flex flex-col-reverse justify-center"><span class="text-center text-md font-bold uppercase -mt-2 text-courageous-plum-300">Jan</span> <span class="text-center text-3xl font-bold">15</span></time>
					<div class="relative grow">
						<h4 class="text-lg font-semibold text-courageous-plum">AIDS is a Civil Rights Issue</h4>
						<time class="font-medium tracking-tighter">Monday, January 15, 2023</time>
						<p class="text-xs mt-1"><span class="pe-4">Atlanta, GA</span></p>
						<a href="/event/we-the-people" class="absolute bottom-0 right-0 w-fit inline-flex items-center px-4 py-2 text-xs font-medium text-center text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							More info
							<svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
