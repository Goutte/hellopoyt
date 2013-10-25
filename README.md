
DEV BLACKBOARD
==============

Remove scrollspy
Copy root files too, using whitelist.


HOW TO INSTALL
==============

Use [Composer](http://getcomposer.org).


HOW TO USE
==========

Create new Project
------------------

In the folder `src/projects`, create a folder whose name is a slug of the project, containing only alphanumerical characters and `-`, prepended by an integer of your choice.
That integer will help you sort the projects in the order you want.
Example : `src/projects/010-ubisoft-25-years`.

Inside this folder, create the file `description.yml`, with a content looking like this :

```
mission: Art Direction / Illustration
client: Ubisoft
agency: Diplomatic-Cover
link: http://25years.ubi.com
```

Then, upload a `thumbnail.jpg` in the folder, size 225x250 pixels.
Then, upload other `.jpg` images of size 940x440 pixels.
Their names do not matter as long as there are no funny characters inside. Say only alphanumericals and `-` or `_` to be on the safe side.

Re-generate the website, and you're done !


Update a Project
----------------

Just update the files, and then re-generate the website.


Generate the Website
--------------------

The sources of the website are in the folder `src/`, and the output folder is `public`.
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
Which I do, and therefore observed broken behavior. I hotfixed Phrozn, removing usage of `Phrozn\Path\Project`.