
Steps for the execution of the project:

1. Go to the project(movies) dir from terminal

2. Run the command “composer update"

3. Put the attached .env file in the root dir of project, and update database credentials

4. Create a database(in MySQL) with the name "movies" and import attached movie database

5. This command (“php artisan migrate”) is optional, we have already imported DB, because we need data for search that is already in DB    

6. then run “php artisan serve” 

7. Now you will be able to access http://localhost:8000/

8. I am sending JSON file for APIs mockup, just import into the postman, then you will have all the APIs

9. For the authentication using jwt auth

10. Test user credentials:
	email: test@gmail.com,
	password:121222

