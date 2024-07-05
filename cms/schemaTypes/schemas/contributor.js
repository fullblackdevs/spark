// ./schemas/person.js

export default {
  name: 'contributor',
  title: 'Contributor',
  type: 'document',
  fields: [
    {
      name: 'fullName',
      title: 'Full name',
      type: 'string',
    },
	{
		name: 'slug',
		title: 'Slug',
		type: 'slug',
	},
    {
      name: 'portrait',
      title: 'Portrait',
      type: 'image',
      options: {
        hotspot: true,
      },
    },
  ],
}
