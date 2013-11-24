OperationTakedown
=================

Small autonomous website based on Silex to display a *"Site under maintenance"* page.

What you will download is basically Silex (v1.1), but with two things more:

- a **special route** to serve every request with a **503 (Service Unavailable)** HTTP Status Code
- a working and ready-to-customize **TWIG template** to display a beautiful HTML page

## What's this for?


When developing a web project, sometimes you need to display a *"Site under maintenance"* or a *"Site under construction"* page. Most of the times you don't want to put such page into your project, but it has to be located elsewhere and be autonomous. The common case is to make Apache virtual host pointing to a temporary folder (in which you put *Operation Takedown* code) and then restore it.

**Operation Takedown** is a micro website based on [Silex](http://silex.sensiolabs.org/) to do just this: deployed in a separate folder and used only in special cases, displays a temporary page with the right HTTP Status Code for your web project.

## Why should I use?

Here are some reasons to use **Operation Takedown** to display the *"Site under maintenance"* page:

- **It's fast to deploy and customize**:

    Follow [How to install](#how-to-install) instructions and get ready in 5 minutes. The entire project weight is ~4.7Mb (most of all vendors), so fast to deploy via ftp.

    What you will probably have to do will be customizing the message to display and the css, and that's it.

    For those already familiar with [Silex](http://silex.sensiolabs.org/) well... 3 minutes.

- **Right HTTP Status Code is returned**:
    
    Reading [this post](http://googlewebmastercentral.blogspot.it/2011/01/how-to-deal-with-planned-site-downtime.html) from Google, the best status code to return in this case is *"503 (Service Unavailable)"*. This is assured if you use this tool.

- **503 (Service Unavailable) is returned for every request**:

    You will want that that a crawler, for **every** url is trying to access to, gets a **503** instead of a **404**; so it's not sufficient to put only "/" under maintenance.

    You will also want, for the same reason, to provide users with a beautiful HTML page for every url requested.


## How to install

1. Download the latest release of **Operation takedon** from [Releases page](https://github.com/inmarelibero/OperationTakedown/releases) and uncompress it.

1. Enter the uncompressed folder with the console, and install the vendors by running:

    > php composer.phar install

   Yes, **Operation takedown** comes with ``composer.phar``already shipped. If you want to be sure to use the latest version, download it from [getcomposer.org](http://getcomposer.org/) and replace the existing one, or just run:

    > php composer.phar self-update

1. Make sure your virtual host points to the ``/web`` folder. If you are using Apache, the ``.htaccess`` (inspired by the Symfony2's one) will do the rewrite to ``index.php``. Fell free to edit it to fit your needs.

1. Ta-daaa! Finished.

## Notes

Developing the first stable version took me no more than ~4 hours. This is incredible and it was made possible by people developing [Silex](http://silex.sensiolabs.org/), so thanks mainly to [@fabpot](https://github.com/fabpot) and [@igorw](https://github.com/igorw) (see [here](https://github.com/silexphp/Silex/graphs/contributors) all contributors).