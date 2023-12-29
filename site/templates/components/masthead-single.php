<div class="flex flex-col justify-end flex-none bg-masthead-about bg-cover min-h-96 px-28 pb-24 bg-blend-darken bg-courageous-plum-950 bg-opacity-50">
	<div class="flex mb-2">
		<div class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">In Person</div>
	</div>
	<h2 class="text-6xl font-semibold tracking-tighter"><?= $pageData['title'] ?></h2>
	<dl>
		<dt>Date</dt>
		<dd class="text-2xl font-medium tracking-tighter"><?= $pageData['date'] ?></dd>
		<dt>Time</dt>
		<dd class="text-2xl font-medium tracking-tighter"><?= $pageData['time'] ?></dd>
		<dt>Location</dt>
		<dd><?= $pageData['location'] ?></dd>
		<dt>Region</dt>
		<dd><?= $pageData['region'] ?></dd>
	</dl>
</div>
