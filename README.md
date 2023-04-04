
## Task List 

1) Install Laravel 8
2) Create basic authentication using laravel auth module
3) There will be 2 types of users. i.e. user and admin
4) List all the users in admin panel
5) There will be 2 dashboards. i) for Admin and ii) for User.
6) Admin can go to user's dashboard but user can not.
7) Create a CRUD functionality for Category. Admin will create n-level of categories. You have to plan db design and execute the features.
8) In Dashboard admin will see nested Categories in a Tree view
    Example:
        Category 1
            Category 1-1
            Category 1-2
        Category 2
            Category 2-1
            Category 2-2


## Dependencies

- PHP Version - 8.0
- Node Version - v18.15.0
- npm Version - 9.5.0

## Installation Steps

Open Command Prompt then run the following commands one by one

- git clone git@github.com:devabiyad/buddy-app.git
- cd buddy-app/
- composer update
- npm install
- npm run dev

Go to code Editor then
- rename .env.example file to .env
- Change DATABASE configuration in .env file.

Open Command prompt again and run these commands one by one:

- php artisan migrate
- php artisan db:seed
- php artisan key:generate
- php artisan serve
