<!DOCTYPE html>
<html class="h-full bg-white">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="noindex">

	<title><?= $pageTitle ?></title>

	<link href="/assets/styles/main-min.css<?= "?v=$version" ?>" rel="stylesheet">
	<script defer src="/assets/scripts/main-min.js<?= "?v=$version" ?>"></script>
</head>

<body class="antialiased h-full">
	<div class="flex min-h-full">
		<?= $content ?>
	</div>
</body>

</html>
