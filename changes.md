// 23-05-2021
new changes

colunm added
1. departmentstudents table
   added year_id, foreign key, size=10


## To get stated with this project do the following

**Default folders that will have to be in the public image directory before deployment**
-- logo
-- profile
-- image
-- resources

mew table changes jul 4 2021
added one culumn in settings table called teacher_access of type boolean


- **create a branch from develop branch and name it yor branch**
- **pull the latest code fron the develop branch**
- **go to the file AppServicePrivider and comment all the code under the boot function**
- ** run the command <code>composer install</code> to install all dependency **
- **if everything goes well, create a database anss call it** ### bcbs
- **the run the command ** <code>php artisan migrate</code> **to create the database tables**
- **then go to the seeders table under database/seeders directory and seed all the information found in the files**
- **for reach of the files, coppy the class_name if each file and type the command** <code>php artisan db:seed -class=<em>class_name</em></code>
- **When all data is been seeded, you can uncomment the code found in AppServiceProvider directory**
- ** `Bravo You are good to go` **
- ** you can either type php artisan serve in the root directory of the bcbs app or go to the browser and go to the link <a traget=_blank href="http://localhost/bcbs">Click to browse</a> **
- **Enjoy the app**
