import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import 'flowbite'
import * as Sentry from '@sentry/browser'

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
	integrations: [new Sentry.BrowserTracing(), new Sentry.Replay()]
});

window.Alpine = Alpine
Alpine.plugin(intersect)

Alpine.start()
