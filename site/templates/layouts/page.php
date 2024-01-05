<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="noindex">

	<title><?= $pageTitle ?></title>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
	<link href="/assets/styles/theme-min.css<?= '?v=' . time() ?>" rel="stylesheet">

	<script>
		window.sentryOnLoad = function() {
			Sentry.init({
				dsn: "https://20dbba795e01fdf9047e1b02244ac562@o104948.ingest.sentry.io/4506447308652544",
				// Alternatively, use `process.env.npm_package_version` for a dynamic release version
				// if your build tool supports it.
				release: "spark@1.0.0",
				// Set tracesSampleRate to 1.0 to capture 100%
				// of transactions for performance monitoring.
				// We recommend adjusting this value in production
				tracesSampleRate: 1.0,

				// Set `tracePropagationTargets` to control for which URLs distributed tracing should be enabled
				tracePropagationTargets: ["localhost", /^https:\/\/spark\.loc/],

				// Capture Replay for 10% of all sessions,
				// plus for 100% of sessions with an error
				replaysSessionSampleRate: 1.0,
				replaysOnErrorSampleRate: 1.0,
				integrations: [new Sentry.BrowserTracing(), new Sentry.Replay()],
			});
		};
	</script>

	<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

	<script src="https://js.sentry-cdn.com/20dbba795e01fdf9047e1b02244ac562.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</head>

<body class="antialiased lg:flex lg:flex-col lg:justify-stretch font-body lg:min-h-lvh">
	<div x-data="{ transitionMobileHomeHeader: false }" class="lg:flex lg:grow lg:flex-col container mx-auto max-w-screen-xl lg:justify-stretch relative">
		<header class="flex grow xl:px-28 lg:-mt-1 <?= !isset($isHome) ? 'bg-courageous-plum text-confident-carnation' : 'text-spark-pink-100 md:bg-transparent' ?> z-50 fixed top-0 transition-all ease-in-out duration-600 md:flex md:static md:h-auto bg-gradient-to-b from-courageous-plum-900/75 w-screen md:w-auto" :class="transitionMobileHomeHeader ? 'bg-courageous-plum-900/75 h-14' : '<?= !isset($isHome) ? 'h-14' : 'h-[20vh]' ?>'" >
			<?= $this->fetch('components/navigation.php', compact('pageSlug')) ?>
		</header>

		<?php if (isset($isHome)) : ?>
			<?= $this->fetch('components/masthead-hero.php') ?>
		<?php elseif (!isset($isSingle) && in_array($pageSlug, ['about', 'partners', 'events', 'resources', 'blog', 'connect'])) : ?>
			<?= $this->fetch('components/masthead.php', compact('pageTitle', 'pageDescription')) ?>
		<?php else : ?>
			<?= $this->fetch('components/masthead-single.php', ['pageData' => $pageData]) ?>
		<?php endif; ?>

		<?= $content ?>
		<?= $this->fetch('components/footer.php') ?>
	</div>
</body>

</html>
