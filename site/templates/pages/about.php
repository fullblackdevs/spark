<div class="flex flex-col justify-end flex-none bg-courageous-plum-800 min-h-[550px] px-28 pb-20 text-spark-pink-100" <?php if (isset($pageHeaderImage)) : ?>style="background: url('/assets/images/<?= $pageHeaderImage ?>') center / cover no-repeat;" <?php endif; ?>>
	<h2 class="text-6xl font-semibold tracking-tighter"><?= $pageTitle ?></h2>
	<p class="text-lg"><?= $pageDescription ?></p>
</div>
<div class="bg-tranquil-pink-600 grow min-h-full px-28 text-black py-16">
	<?php foreach ($content as $section) : ?>
		<?php if (isset($section['format']) && $section['format'] === 'text-with-image-left') : ?>
			<div class="flex justify-between">
				<img src="/assets/images/<?= $section['image'] ?>" alt="<?= $section['title'] ?>" class="size-2/5 self-center rounded-lg shadow-md">
				<div class="w-1/2 my-6">
					<h3 class="font-display text-4xl uppercase tracking-tight mb-4"><?= $section['title'] ?></h3>
					<p class="leading-loose"><?= $section['body'] ?></p>
				</div>
			</div>
		<?php elseif (isset($section['format']) && $section['format'] === 'accordian-with-image-right') : ?>
			<div class="flex flex-row-reverse justify-between mt-20">
				<img src="/assets/images/<?= $section['image'] ?>" alt="<?= $section['title'] ?>" class="size-2/5 rounded-lg shadow-md">
				<div class="w-1/2 my-6">
					<h3 class="font-display text-4xl uppercase tracking-tight mb-4"><?= $section['title'] ?></h3>

					<?php if (isset($section['body']) && is_array($section['body'])) : ?>
						<div id="accordion-flush" data-accordion="collapse">
							<?php foreach ($section['body'] as $index => $item) : ?>
								<?php $i = $index + 1; ?>
								<h2 id="accordion-flush-heading-<?= $i ?>">
									<button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-<?= $i ?>" aria-expanded="true" aria-controls="accordion-flush-body-<?= $i ?>">
										<span><?= $item['title'] ?></span>
										<svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
											<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
										</svg>
									</button>
								</h2>
								<div id="accordion-flush-body-<?= $i ?>" class="hidden" aria-labelledby="accordion-flush-heading-<?= $i ?>">
									<div class="py-5 border-b border-gray-200 dark:border-gray-700">
										<p class="mb-2 text-gray-500 dark:text-gray-400"><?= $item['text'] ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
