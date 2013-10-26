
DEV BLACKBOARD
==============

Project details.
Secret URL for re-generation.


HOW TO INSTALL
==============

This is for devs only !
Use [Composer](http://getcomposer.org).
Then, generate the website.


WHAT YOU NEED TO KNOW
=====================

The SOURCES of the website are under the `src/` folder.
This is the folder where you will find EVERYTHING there is to change.

The generated HTML/CSS/JS will be in the `public/` folder.
NEVER EVER change files in the `public/` folder as they will be OVERWRITTEN !

Other folders you don't care about :
- `bin` : dev scripts you need not care about
- `design` : misc design sources, not useful for the website but useful to me
- `vendor` : external libraries needed to make things work



HOW TO USE
==========

Change intro images
-------------------

Look into `src/styles/introduction.less`, from row01 to row05. Easy !

Create new Project
------------------

In the folder `src/projects`, create a folder whose name is a slug of the project, containing only alphanumerical characters and `-`, prepended by an integer of your choice.
That integer will help you sort the projects in the order you want.
Example : `src/projects/010-ubisoft-25-years`.

Inside this folder, create the file `description.yml`, with a content looking like this :

``` description.yml
title: Ubisoft 25 Years
mission: Art Direction / Illustration
client: Ubisoft
agency: Diplomatic-Cover
link: http://25years.ubi.com
```

Then, upload a `thumbnail.jpg` in the folder, size 225x250 pixels.
Then, upload other `.jpg` images of size 940x440 pixels.
Their names do not matter as long as there are no funny characters inside. Say only alphanumericals and `-` or `_`, to be on the safe side.

Re-generate the website, and you're done !


Update a Project
----------------

Just update the files, and then re-generate the website.


(Re)Generate the Website
------------------------

The sources of the website are in the folder `src/`, and the output will be written in `public`.
Only the latter should be available on the server.


### Dev

Launch in CLI :

```
bin/build
```

### Prod

Visit a certain (secret!) URL.
It should auto-commit to a git repo, too !

???


HOW TO ANIMATE
==============

1. Read the Manual
------------------

https://github.com/Prinzhorn/skrollr


2. Play !
---------

Edit `src/entries/index.twig` and `src/styles/introduction.less`.


PITFALLS
========

Phrozn plugin's `projectPath` logic require a `.phrozn` folder at the root of the project.
This is dumb, IMNSHO, as I'd rather use explicit `src` and `public` folders as respectively in and out.
Which I do, and therefore observed broken behavior.
**So,** I hotfixed Phrozn, removing usage of `Phrozn\Path\Project`.