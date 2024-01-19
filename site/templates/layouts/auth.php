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
		<?= $content ?>
	</div>
</body>

</html>
