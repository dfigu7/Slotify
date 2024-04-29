# Project Outline

## The name of the project is slotify, an interactive music player.

In this project users, wich can be registered and logged in into their accounts, can listen to the music available in it. There are always admin users which have access to a dashboard on the navbar wich has access to an admin panel. They can personalize their accounts and create new playlists according to their liking. It has features like choosing and playing the msuic the want, keeping the next songs in shuffle, repeating a certain song, adding the songs they like to their own playlists and more.  The project makes use of all of the requirements given such as:

1. CSS

A simple and aesthetic styling, including flexboxes for it's navbar.

2. JavaScript

JavaScript is included throughout the whole project and makes use of it's event listeners to take interactions from the users.

3. Validating input with regular expressions 

Regular expressions are used when signin up and signin in to verify the credentials. For example, it tells the user when signing up to use the right format for their username or email address...

4. Sanitizing data

Sanitizing consists of removing any unsafe character from user inputs, and validating will check if the data is in the expected format and type.

5. MySQL database

Every thing is stored and accessed through it's database. The data redudnacy is reduced as much as possible and it is witthin the 3rd Normal Form.

6. User registration and authentication

When users first launch the website, they go in the authentication page where users can register for an account or logging in into an existing one. This process uses regular expressions to make sure that their inputs are valid.

7. Different views for seperate roles

There are 2 different roles with different views. 
1- Normal users
2- Admin users

Admin users have a different interface with a dashboard extra. There they have admin access where they can see statistics, add new users, see users basic information and details or deleting existing users.

8. REST API

It includes REST API to get the benefits of it's requesting methods. Mostly it contains POST request.

9. AJAX

AJAX handling has it's own folder with files that handles most of the important actions and changes that can be made by users.

10. Friendly URLs with Apache mod_rewrite module

Using this module, it ensures us easy and very friendly URLs and not complicated and weird ones.



