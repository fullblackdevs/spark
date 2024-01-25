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

<nav x-data="{ showMobileNav: false }" class="fixed top-0 flex justify-between grow w-screen md:h-full items-center md:relative">
	<h1 class="grow-0 overflow-hidden relative z-50">
		<a href="/">
			<svg viewbox="0 0 250 63" class="font-display text-8xl h-14 md:h-20 font-bold">
				<text y="65" class="fill-current uppercase">Spark</text>
			</svg>
		</a>
	</h1>
	<button type="button" class="p-2.5 text-white md:hidden relative z-50" x-on:click="showMobileNav = !showMobileNav">
		<span class="sr-only">Open sidebar</span>
		<svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			<path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
		</svg>
	</button>
	<ul class="absolute inset-0 md:static md:flex flex-col gap-4 md:gap-6 md:flex-row md:grow md:justify-between lowercase font-body font-semibold text-3xl md:text-xl tracking-tight xl:-ms-4 xl:me-4 w-dvw md:w-fit px-12 py-24 md:px-0 md:py-0 h-dvh md:h-full overflow-hidden bg-courageous-plum/90 md:bg-transparent shrink-0" :class="showMobileNav ? 'flex' : 'hidden'">
		<?php foreach ($routes as $route) : ?>
			<?= $route === $pageSlug ? '<li class="' . implode(' ', [$base, $active]) . '">' : '<li><a href="/' . $route . '" class="' . implode(' ', [$base, $hover]) . '">' ?>
			<?= $route === 'blog' ? 'Sparkle' : ucfirst($route) ?>
			<?= $route === $pageSlug ? '</li>' : '</a></li>' ?>
		<?php endforeach; ?>
	</ul>
	<div class="hidden md:flex justify-end items-center text-2xl gap-2 font-body font-semibold tracking-tight md:mx-4 shrink-0 z-50">
		<a href="<?= $Router->urlFor('user.login') ?>" class="h-fit px-5 py-2.5 text-sm font-medium text-center rounded-lg text-spark-gold hover:text-spark-gold-100 border border-spark-gold hover:bg-spark-gold-800 focus:ring-2 focus:outline-none focus:ring-spark-gold-300">
			<?= isset($Auth) && $Auth->isLoggedIn() ? 'Site Manager' : 'Admin Login' ?>
		</a>
	</div>
</nav>
