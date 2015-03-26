# DVSN
Damn Vulnerable Social Network for penetration testers.
Don't upload this on your hosting, upload this only to XXMP, which means Any OS(X), Any Webserver(X), MySQL(M), PHP (P).
If you upload this to your hosting so it is publically available, you will get hacked. I've warned you.
I know this isn't a great Social Network platform, but you can login, register and add something to the feed.


# Vulnerabilities
* XSS
* Blind SQL Injection
* CSRF
* LFI
* File Upload

# Who contributed?
I made everything in just one single day with the images from https://unsplash.com/. I'm bad at CSS so I used Materialize.css too.
I used Acuney-Framework and RegTPL, which is developed by me too, you can find this on GitHub.

# Installation

First of all you have to setup a local webserver, you can find tutorials for that on the internet.
Now you have a local webserver, you can surf to https://github.com/itsmesam/DVSN and click on the bottom right on "Download ZIP". 
Extract the ZIP to your local webservers path, in my case it is /opt/lampp/htdocs.
After that, create a MySQL database, I call it dvsn. Now import the dvsn.sql dumpfile into your database.
Change the /app/bootstrap.php's settings. The names of the constants are self explaining.
Start your webserver and navigate to 127.0.0.1. Great, now you can use DVSN. 


