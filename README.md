
WHAT YOU NEED TO KNOW
=====================

On the FTP, there are two root folders :
- `www` : will hold the static files, you should *never* change anything in here.
          We don't have a choice, the server is configured to serve the files in the `www/` folder,
          otherwise I'd have used the `hellopoyt/public` folder instead of copying it. No problem here.
- `hellopoyt` : holds the whole project, whose directories are explained below.

The SOURCES of the website are under the `src/` folder.
This is the folder where you will find EVERYTHING there is to change.  <= IMPORTANT !

I repeat : `src/` is EVERYTHING !

The GENERATED HTML/CSS/JS will be in the `public/` folder.
NEVER EVER change files in the `public/` folder as they will be OVERWRITTEN !
The contents of `public/` will be copied to the root `www` folder.

Other folders you don't care about :
- `bin` : dev scripts you need not care about
- `design` : misc design sources, not useful for the website but useful to me
- `vendor` : external libraries needed to make things work



HOW TO USE
==========

Change intro images
-------------------

Change the 5 images `src/media/img/introduction/XX.jpg`. Easy !
The related CSS is in `src/styles/introduction.less`.

Create new Project
------------------

In the folder `src/projects`, create a folder whose name is a slug of the project, containing only alphanumerical characters and `-`, prepended by an integer of your choice.
That integer will help you sort the projects in the order you want.
Example : `src/projects/010-ubisoft-25-years`.

Inside this folder, create the file `description.yml`, with a content looking like this :

``` description.yml
title: Ubisoft 25 Years
subtitle: The Pie's The Limit
mission: Art Direction / Illustration
client: Ubisoft
agency: Diplomatic-Cover
link: http://25years.ubi.com
```

Then, upload a `thumbnail.jpg` in the folder, size 300x200 pixels.
Then, upload other `.jpg` images of size 940x440 pixels.
Their names do not matter as long as there are no funny characters inside. Say only alphanumericals and `-` or `_`, to be on the safe side.

Re-generate the website, and you're done !


Update a Project
----------------

Just update the files, and then re-generate the website.


(Re)Generate the Website
------------------------

The sources of the website are in the folder `src/`, and the output will be written in `public/` and copied to root `www/`.

### Pat

Visit http://hellopoyt.com/hellopoyt/generate.php

### Dev

Launch in CLI :

```
bin/build
```

HOW TO ANIMATE
==============

1. Read the Manual
------------------

https://github.com/Prinzhorn/skrollr


2. Play !
---------

Edit `src/entries/index.twig` and `src/styles/introduction.less`.
Then, re-generate the website !



HOW TO INSTALL
==============

This is for devs only !
Use [Composer](http://getcomposer.org).
Then, generate the website.

