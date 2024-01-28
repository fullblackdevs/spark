<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="noindex">

	<title><?= $pageTitle ?></title>

	<link href="/assets/styles/main-min.css<?= "?v=$version" ?>" rel="stylesheet">
	<script defer src="/assets/scripts/main-min.js<?= "?v=$version" ?>"></script>
</head>

<body class="antialiased lg:flex lg:flex-col lg:justify-stretch font-body lg:min-h-lvh">
	<div x-data="{ transitionMobileHomeHeader: false }" class="lg:flex lg:grow lg:flex-col container mx-auto max-w-screen-xl lg:justify-stretch relative">
		<header class="flex xl:px-28 lg:-mt-1 <?= !isset($isHome) ? 'bg-courageous-plum text-confident-carnation' : 'text-spark-pink-100 md:bg-transparent' ?> z-50 fixed top-0 transition-all ease-in-out duration-600 md:flex md:static md:h-auto bg-gradient-to-b from-courageous-plum-900/75 w-screen md:w-auto" :class="transitionMobileHomeHeader ? 'bg-courageous-plum-900/75 h-14' : '<?= !isset($isHome) ? 'h-14' : 'h-[20vh]' ?>'" >
			<?= $this->fetch('components/navigation.php', compact('pageSlug')) ?>
		</header>

		<?php if (isset($isHome)) : ?>
			<?= $this->fetch('components/masthead-hero.php') ?>
		<?php elseif (!isset($isSinglePage) && isset($pageSlug) && in_array($pageSlug, ['about', 'connect'])) : ?>
			<?= $this->fetch('components/masthead.php', compact('pageTitle', 'pageDescription')) ?>
		<?php endif; ?>

		<?= $content ?>
		<?= $this->fetch('components/footer.php') ?>
	</div>
</body>

</html>
