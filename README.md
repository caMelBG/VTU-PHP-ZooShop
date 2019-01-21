# Zoo-Shop (Зоо Магазин)


Системата служи за съхраняване на данни за животните в
зоомагазин(име, порода, дата на раждане, вид животно), списък с породи,
списък с различни видове животни(„заек“, „хамстер“, „котка“, „куче“). 


  

### Технологии

Магазинът използва няколко open source проекта за да работи правилно:

* PHP - programming language
* MySql - data base 
* Laravel - MVC framework
* Equivalent - ORM framework
* Composer - packege  manager
* Twitter Bootstrap - HTML and CSS library
* HTML and CSS


### Инсталация

 - Свалете или клонираите проекта
 - Отворете командния ред (shell) в директорията на проекта
 - Изпълнете следите команди
`composer install`,
`php artisan key:generate`
 - В главната директория на проекта отворете .env файла и настройте връзката към базата
 

    
        DB_HOST=
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
    
    
 
 - Изпълнете следната команда, за да изпълните миграциите `php artisan migrate`
 - Изпълнете следната команда за да изпълните сийдърите `php artisan db:seed`
 - Стартирайте проекта с командата `php artisan serve`




### За довършване

 - Показване на последните качени хивотни
 - Добавяне на лиценз
 - Добавяне на дизайн
 - Сортиране на животните по порода, вид и име

Лиценз
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
