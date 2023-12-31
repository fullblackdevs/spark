<?php
$routes = [
	'about',
	'partners',
	'events',
	'resources',
	'blog',
	'connect',
];

$base = 'inline-block py-2 relative z-50';
$active = 'border-b-2 border-spark-gold';
$hover = 'border-b-2 border-transparent hover:text-confident-carnation-400 hover:border-spark-gold'; // arbitrary hover color needed to be added last to work as expected
?>

<nav x-data="{ showMobileNav: false }" class="flex justify-between grow items-center h-full relative">
	<h1 class="font-display text-7xl lg:text-9xl font-bold uppercase -mb-5 lg:-mb-8 -mt-2.5 lg:-mt-3"><a href="/">Spark</a></h1> <!-- need to work on these ratios -->
	<button type="button" class="p-2.5 text-white md:hidden relative z-50" x-on:click="showMobileNav = !showMobileNav">
		<span class="sr-only">Open sidebar</span>
		<svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			<path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
		</svg>
	</button>
	<ul class="absolute inset-0 md:static md:flex flex-col gap-4 md:flex-row md:grow md:justify-between lowercase font-body font-semibold text-3xl md:text-xl tracking-tight md:ml-6 md:me-12 w-dvw md:w-fit px-12 md:px-0 py-16 md:py-0 h-dvh md:h-full overflow-y-auto bg-courageous-plum/90 md:bg-transparent" :class="showMobileNav ? 'flex' : 'hidden'">
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
