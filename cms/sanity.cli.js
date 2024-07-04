import {defineCliConfig} from 'sanity/cli'

export default defineCliConfig({
  api: {
    projectId: 'rgpic9r8',
    dataset: 'development'
  },
  server: {
	hostname: "0.0.0.0"
  }
})
