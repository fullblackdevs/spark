<div class="relative hidden flex-1 w-0 xl:flex xl:w-3/5">
	<img class="absolute inset-0 h-full w-full object-cover" src="/assets/images/AdobeStock_660421479.webp" alt="">
</div>
<div class="flex flex-col justify-center w-full xl:w-2/5 lg:flex-none bg-spark-pink-300 xl:px-8">
	<?php if (isset($httpStatus) && $httpStatus === 401) : ?>
		<div>You must be logged in to access that resource.</div>
	<?php endif; ?>
	<div class="flex flex-col gap-6 bg-white p-8 shadow rounded-lg w-full max-w-md min-w-96 mx-auto shrink-0 border-2 border-tranquil-pink-600">
		<div class="mx-auto w-full">
			<h1 class="grow-0 overflow-hidden relative z-50">
				<svg viewbox="0 0 225 65" class="font-display text-8xl h-20 font-bold mx-auto text-courageous-plum">
					<text y="65" class="fill-current uppercase">Spark</text>
				</svg>
			</h1>
			<h2 class="mt-2 text-center text-3xl font-bold text-spark-gold-800 tracking-tighter">
				Site Manager
			</h2>
		</div>
		<?php if (isset($Flash) && $Flash->has('error')) : ?>
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
				<strong class="font-semibold block sm:inline"><?= $Flash->get('error')[0] ?></strong>
			</div>
			<?php $Flash->clear() ?>
		<?php endif; ?>
		<form class="space-y-6" action="<?= $Router->urlFor('user.login') ?>" method="POST">
			<div>
				<label for="email" class="block text-sm font-medium text-gray-700">
					Username
				</label>
				<div class="mt-1">
					<input id="username" name="username" type="username" autocomplete="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
				</div>
			</div>

			<div>
				<label for="password" class="block text-sm font-medium text-gray-700">
					Password
				</label>
				<div class="mt-1">
					<input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
				</div>
			</div>

			<div class="flex items-center justify-between">
				<div class="flex items-center">
					<input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
					<label for="remember-me" class="ml-2 block text-sm text-gray-900">
						Remember me
					</label>
				</div>

				<div class="text-sm">
					<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
						Forgot your password?
					</a>
				</div>
			</div>

			<div>
				<button type="submit" class="w-full flex justify-center px-3 py-4 shadow-sm text-md font-medium text-courageous-plum border-2 border-courageous-plum rounded-lg hover:bg-courageous-plum-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-courageous-plum-400 uppercase">
					Sign in
				</button>
			</div>
		</form>
	</div>
</div>
