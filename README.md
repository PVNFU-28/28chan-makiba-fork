# makiba
Imageboard software on /devel/
makiba Development
~~~~~~~~~~~~~~~~~~~

#credits
tripcode!q/7 - helping out with the software
Pineapple - helping out aswell

~~~~~~~~~~~~~~~~~~~
small imageboard script- on devel


Installation
~~~~~~~~~~~~

To install, move all the files in the repo to a directory in the
root of your webserver. For example, for a board called `/b/`, move
them to /usr/share/nginx/html/b/. Create the directories `src`,
`thumb`, `bans`, `bad` and `res` and the files `posts` and `info`,
make sure they are all writable to by the web server user.

Should work on any unix-like system with PHP 5.5 or above and GD Library.

Protip: you can use it as a blog too, by setting the following:
ADMINOPONLY=1,
SORTBUMP=0
REPLYBOX_TOP=0
SHOWPOSTLIST=1
PERPAGE=1 if you want

 
