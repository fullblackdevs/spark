// ./schemas/post.js
import {defineType, defineField, defineArrayMember} from 'sanity'

export default defineType({
	title: 'Post',
	name: 'post',
	type: 'document',
	fields: [
		defineField({
			title: 'Title',
			name: 'title',
			type: 'string'
		}),
		defineField({
			title: 'Slug',
			name: 'slug',
			type: 'slug',
			options: {
				source: 'title'
			}
		}),
		defineField({
			title: 'Published at',
			name: 'publishedAt',
			type: 'datetime'
		}),
		defineField({
			title: 'Author',
			name: 'author',
			type: 'reference',
			to: [
				defineArrayMember({type: 'contributor'})
			]
		}),
		defineField({
			title: 'Header Image',
			name: 'headerImage',
			type: 'image'
		}),
		defineField({
			title: 'Summary',
			name: 'summary',
			type: 'text'
		}),
		defineField({
			title: 'Content',
			name: 'content',
			type: 'array',
			of: [
				defineArrayMember({type: 'block'}),
				defineArrayMember({type: 'image'})
			]
		})
	]
})
