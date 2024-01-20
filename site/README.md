# Spark 2

This document provides technical information for the Spark 2 codebase.

## Content Management

Spark 2 content is managed using documents formatted as JavaScript Object Notation (JSON). There were a number of reasons behind the rationale for this choice.

### Database

### Markdown

### User Interface

### Sanity.io

A future release of Spark 2 may implement the Sanity.io content management platform.

## User Interface

Templates don't live in the `src` directory because they are not PHP classes that need to be accessed via auto-loading (although we may build an additional layer of UI classes that serve as a intermediary between the Actions that receive and respomd to HTTP requests and the final rendering of any output). Templates for rendering the HTML for the Spark 2 website are located in the `templates` directory and are comprised are the following resouces:

### Components

Components are self-contained HTML with embedded PHP variables that can be used across the site. Components will be the first template to be resources to be integrated into the UI Classes architecture.

### Layouts

### Pages

Pages contain the primary response to a request object and are self contained views of a specific resource or collection of resources. They are named after the resource they represent. They may be further separated by the Domain or Role that may access the page. Root pages are publicly accessible and do not require authentication to view.

### Themes

Themes are collections of Components, Pages and Layout

## Security

Configuration data for the Spark 2 website is store in an AWS S3-compatible object store as an encrypted JSON document. This document is read by decrypting with a pre-determined and rotated Organization ID as the "salt" and I predefined Organization Encryption Key, parsed and cached. The encryption key is stored in the Registry. The Organization ID is stored in the Registry and the Environment.
