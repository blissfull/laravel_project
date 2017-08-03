# laravel_project

Requirements:
1) To run this project localserver is required (wamp)
2) php >= 5.6
3) Database name used is laravel_project with usernamne root and no password

Instructions to run:
1) Download the code and place it inside www folder of wampserver
2) first run this command " php artisan migrate " to create tables
3) then open http://localhost:8080/laravel_project/public/
4) login page will appear you can register a new user but if you don't want to use default user
5) credentials for defalut users are email: mick@ezequote.com.au and password: password
6) after login a form will appear (in order to create new project add detail in this from)
7) user can view all the projects created by him by clicking view all projects button on the right corner
8) in order to go back to form click creat a project button on the left corner

Run test cases:
vendor\bin\phpunit tests\Feature\ExampleTest.php
unit test case
vendor\bin\phpunit tests\Unit\ExampleTest.php

Modal factory: 
for testing you may need to create new project for that factory is provided 
<br/>
eg: factory(App\Projects::class)->create();
