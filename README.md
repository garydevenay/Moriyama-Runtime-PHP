# Moriyama.Runtime (PHP)
PHP implementation of the Umbraco runtime that was proposed by Darren Ferguson (http://blog.darren-ferguson.com/2015/06/14/a-runtime-for-umbraco/).

A PHP implementation of the Runtime would allow you to serve your website on cheap Linux servers (compared to standard pricing of Windows servers) whilst still allowing content editors to use Umbraco to build the site structure.

## index.php
The index.php is set up to handle all routing via the .htaccess and `?url=` query string. If required, you can always access the current URL with `$_REQUEST['url']`.

When an instance of `$runtime = new Moriyama\Runtime()` is created, you will be provided access to two public properties to access the Runtime content.

### $node
`$runtime->node` will give you access to all exported properties of the requested Umbraco node (including Content). As we are parsing the JSON with `json_decode()` this property will remain dynamic if future properties are added.

### $content
`$runtime->content` is purely a shortcut to `$runtime->node->Content` to provide an easier way to access the content properties of your node.

### Templating
Templates are stored in the `templates/` folder. All template names should equal that which is defined in Umbraco only **all lower case**.

In all templates you will have access to `$runtime->node` and `$runtime->content`.

## Home node
The url rewriting looks for `home` to be the root content folder, though this can be overwritten in the `.htaccess` file if required.
