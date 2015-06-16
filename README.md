# Moriyama.Runtime (PHP)
PHP implementation of the Umbraco runtime that was proposed by Darren Ferguson (http://blog.darren-ferguson.com/2015/06/14/a-runtime-for-umbraco/). This implementation has no dependency on Umbraco or any particular CMS.

A PHP implementation of the Runtime would allow you to serve your website on cheap Linux servers (compared to standard pricing of Windows servers) whilst still allowing content editors to use Umbraco to build the site structure.

## index.php
The index.php is set up to handle all routing via the .htaccess and `?url=` query string. If required, you can always access the current URL with `$_REQUEST['url']`.

When an instance of `$runtime = new Moriyama\Runtime()` is created, you will be provided access to two public properties to access the Runtime content.

### $node
`$runtime->node` will give you access to all exported properties of the requested Umbraco node (including Content). As we are parsing the JSON with `json_decode()` this property will remain dynamic if future properties are added.

### $content
`$runtime->content` is purely a shortcut to `$runtime->node->Content` to provide an easier way to access the content properties of your node.

##Templates
Templates are stored in the `templates/` folder. Templates may be nested to as many levels as required (See `$runtime->RenderTemplate($name)` for rendering custom templates)

In all templates you will have access to `$runtime->node` and `$runtime->content` properties.

### $runtime->GetTemplate()
When using `$runtime->GetTemplate()` to automatically implement a template, the template name should equal that which is defined in Umbraco only **all lower case**.

### $runtime->RenderTemplate($name)
'$runtime->RenderTemplate($name)' allows you to override the automatic template assignment that is provided by `$runtime->GetTemplate()`. This is particularly useful when defining master pages (see index.php) or maintaining reusable content.

## Home node
The url rewriting looks for `home` to be the root content folder, though this can be overwritten in the `.htaccess` file if required.
