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
$active = 'border-b-2 border-spark-gold';
$hover = 'border-b-2 border-transparent hover:text-confident-carnation-400 hover:border-spark-gold'; // arbitrary hover color needed to be added last to work as expected
?>

<nav class="md:flex md:grow md:items-center md:ml-6 h-fit overflow-y-hidden">
	<h1 class="font-display text-6xl md:text-7xl lg:text-9xl font-bold uppercase -mb-4 lg:-mb-8 -mt-2 lg:-mt-4"><a href="/">Spark</a></h1>
	<ul class="hidden md:flex grow justify-between list-none lowercase font-body font-semibold text-xl tracking-tight me-12 lg:text-2xl">
		<?php foreach ($routes as $route) : ?>
			<?= $route === $pageSlug ? '<li class="' . implode(' ', [$base, $active]) . '">' : '<li><a href="/' . $route . '" class="' . implode(' ', [$base, $hover]) . '">' ?>
			<?= $route === 'blog' ? 'Sparkle' : ucfirst($route) ?>
			<?= $route === $pageSlug ? '</li>' : '</a></li>' ?>
		<?php endforeach; ?>
	</ul>
	<div class="hidden md:flex items-center text-2xl gap-2 font-body font-semibold tracking-tight">
		<button type="button" class="h-fit text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Admin Login</button>
	</div>
</nav>
