# FB-Project
Repository for FB-Project.

How to use:

1, Download and install Xampp from https://www.apachefriends.org/de/download.html
(Use default settings during the installation)

2, Go to C:/xampp and start the xampp-control.exe

3, Start the Apache and MySQL services within the control panel

4, Download this repository as .zip or to your desktop using gitclone

5, Open the .zip File go to FB-project-master folder select all files and copy them to C:/xampp/htdocs

6, Open new tab in your browser, type in localhost/phpmyadmin and press enter

7, Create a new database called fb-projekt and select it from the menu on the left

8, Click on import on the upper menu bar, click on "Browse" button and select C:/xampp/htdocs and select the fb-projekt.sql
(remove the partial import tag and uncheck the Auto-increment tag in Format-Specific Options tab)

9, Click on "Go" and finish the creation, afterwards you can delete the .sql file from your htdocs folder

10, Go to your browser and edit the URL from localhost/phpmyadmin to localhost/main.php

11, Create a new account via the signup form and log in to enter the chat room

12, If you get error message or can't see what you wrote, try to create empty chat.txt file in your htdocs folder
