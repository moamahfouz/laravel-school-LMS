## School Sys based on Laravel

### Installation
01. `git clone https://github.com/moamahfouz/school_sys.git`
02. `cd school_sys`
03. `composer install`
04. `npm install`
05. `cp .env.example .env`
06. `php artisan key:generate`
07. `php artisan migrate`
08. `php artisan db:seed`
09. `php artisan serve`

### Packages
01. `laravel-multiauth`

### Credentials

Seeder :

-   School : email = school@school.com, password = school@school.com
-   Teacher : email = teacher@teacher.com, password = teacher@teacher.com and Role: Teacher
-   Student : email = student@student.com, password = student@student.com
