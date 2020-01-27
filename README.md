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
Create a database called image_upload and create a table called images with fields:

id - int(11)
image - varchar(100)
image_text - text
Create a file called index.php


Be sure to include the enctype in your form tag. Like this:

<form method="POST" action="index.php" enctype="multipart/form-data">
Without the attribute enctype="multipart/form-data", the image won't be uploaded. enctype is the encoding type that specifies how the form-data should be encoded when submitting the form. Without it file uploads won't work.

 
