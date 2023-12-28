<?php
	$routes = [
		'about',
		'partners',
		'events',
		'resources',
		'blog',
		'connect',
	];

	$base = 'inline-block py-2';
	$active = 'border-b-2 border-[#CFAE70]';
	$hover = 'border-b-2 border-transparent hover:text-confident-carnation-400 hover:border-[#CFAE70]'; // arbitrary hover color needed to be added last to work as expected
?>
<h1 class="text-9xl font-bold uppercase -mb-8 -mt-2"><a href="/">Spark</a></h1>
<nav class="flex grow text-2xl items-center ml-6">
	<ul class="flex grow justify-between list-none lowercase font-body font-semibold text-xl tracking-tight me-12">
		<?php foreach($routes as $route): ?>
			<?= $route === $pageSlug ? '<li class="' . implode(' ', [$base, $active]) . '">' : '<li><a href="/' . $route . '" class="' . implode(' ', [$base, $hover]) . '">' ?>
			<?= $route === 'blog' ? 'Sparkle' : ucfirst($route) ?>
			<?= $route === $pageSlug ? '</li>' : '</a></li>' ?>
		<?php endforeach; ?>
	</ul>
	<div class="flex items-center text-2xl gap-2 font-body font-semibold tracking-tight">
		<button type="button" class="h-fit text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Admin Login</button>
	</div>
</nav>