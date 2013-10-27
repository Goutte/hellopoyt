
DEV BLACKBOARD
==============

- Secret URL for re-generation.


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

Then, upload a `thumbnail.jpg` in the folder, size 225x250 pixels.
Then, upload other `.jpg` images of size 940x440 pixels.
Their names do not matter as long as there are no funny characters inside. Say only alphanumericals and `-` or `_`, to be on the safe side.

Re-generate the website, and you're done !


Update a Project
----------------

Just update the files, and then re-generate the website.


(Re)Generate the Website
------------------------

The sources of the website are in the folder `src/`, and the output will be written in `public/`.
Only the latter should be available on the server, but you don't need to care about this.


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

