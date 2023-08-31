# giornalino

I'll start by explaining what it is and clarifying some questions.

The project is a school blog.Everyone,including people outside of the school can read the articles and posts published and validated.These people can enter as guests and none of
their usage data is being used or tracked or saved.The articles can be written by a writer (duh) and,in order to be seen by the public,must be validated by a validator.Here's the 
first question that might come to mind - Who are these users?
The writer writes and uploads articles.The validator proofreads the post and approves (or validates) it.Only with approval can the article be read by the public.This also sparks 
another question - Where to sign up?
In order to read published articles,one has to only click the 'Reader' button and enter as guest (no login).Given that the blog is a school blog,the writers and the proofreaders 
can only be the students and professors at that school as well as other members of the school staff.
The website is managed by someone at the same school (could be the principal or a professor or the network manager or anyone).This brings the opportunity to skip the registration 
process,that would require to check for some type of document to be sure whoever signs up is at that school,by doing a simple thing - whoever wants to register contacts the manager 
of the blog and asks them to insert their data into the user database and create them an account with credentials.Upon first login,the user is asked in a form to change their passowrd,
but there wasn't a backup for that file specifically and it got deleted.
There is also the design issue - it has a very confusing responsiveness.Yes,the website is desktop first.

If there are other questions contact me - cipriancorobcacc@pm.me

;-----------------------------------------------------------------------------------------------------

Ok.Now a rant about webhosting.

I will explain why there is a demo and why I didn't upload the full website to the webhosting platform (in this case 000webhost).
If you open the project from my portfolio website (https://cipriancorobca.github.io) you land on a page that looks nothing like a
login form.On top of that,there's a label at the bottom saying 'This is demo version'.It all started when I realised PHP webpages
have to be uploaded to a webserver in order to be used.I knew this since day 1 of coding in PHP as I made use of Apache and XAMPP 
to simulate a server on my local machine.A respectable website makes use of sessions and cookies to keep track of whethersomeone is 
logged in with the right credentials and the right privileges to use certain features.On my local server I didn't have any problems 
with that,the session methods and variables worked as expected.The problem rose on the webhosting platform.Upon logging in the website 
would throw errors about session variables not being initialised.After a bit of research I figured out session data,for some reason,
doesn't tranfer between pages.This means that login credentials aren't being used by the server to authenticate the user.This was big 
problem obviously.After trying to mess around with it and trying different workaround I found a way around it that somewhat works.
Instead of providing the ability to login with credentials,I provided the (dis)ability to login by button.The session variables would 
be inistialised as constant data.This is a restrictive thing - there are 2 writer accounts and 2 validator accounts but I can only 
login with 1 of each.This explains another big questions about this type of 'login'.
