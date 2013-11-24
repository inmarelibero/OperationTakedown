Handle CSS and other assets
===========================

As it is now, [`/views/layout.html.twig`](/views/layout.html.twig) includes the external  CSS file [`/web/css/frontend.css`](/web/css/frontend.css).

For very simple pages, you may want not to use an external CSS file, because:

- you want to reduce the number of requests to the server: only an HTML file is server, instead of an TML file and a CSS file.

- CSS is so simple that you want to put it directly in HTML

- for caching purposes, you don't want to deal with the external CSS file

So, to include CSS rules as *Internal Style Sheet*, do the following:

1. Remove `/web/css` folder.

1. Replace

        <link rel="stylesheet" type="text/css" href="/css/frontend.css" />

    with

        <style>
            ...
        </style>

    tags.