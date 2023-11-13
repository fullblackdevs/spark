export default {
	name: 'organizations',
	title: 'Organizations',
	type: 'document',
	fields: [
		{
			name: 'name',
			title: 'Name',
			type: 'string',
		},
		{
			name: 'url',
			title: 'URL',
			type: 'url',
		},
		{
			name: 'abbreviation',
			title: 'Abbreviation',
			type: 'string',
		},
		{
			name: 'logo',
			title: 'Logo',
			type: 'image',
		},
	],
}
