
DEV BLACKBOARD
==============

GIT !




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

Dev
~~~

Launch in CLI :

```
bin/build
```



Prod
~~~~

Visit a certain (secret!) URL.
It should auto-commit to a git repo, too !

???



PITFALLS
========

Phrozn plugin's `projectPath` logic require a `.phrozn` folder at the root of the project.
It need not contain anything.
This is dumb, IMNSHO, as I'd rather use explicit `src` and `public` folders as respectively in and out.
Which I do, and therefore observed broken behavior.

See Phrozn\Path\Project.