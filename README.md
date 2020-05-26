# BIC4 Project: Klingon dictionary

## Klingon in 10 tupmey - A dictionary for every ghot

This software lists klingon terms and translation belongs to them.
It is possible to search for terms by various parameters.

## Exercise

### Already providing

All routes that are needed are implemented:
 * **GET** ```/translation``` &rarr; Lists all translations
 * **GET** ```/list/translation``` &rarr; Returns JSON of all translations
 * **GET** ```/list/term``` &rarr; Returns JSON of all term
 * **POST** ```/translation``` &rarr; Stores new translations
 * **GET** ```/translation/{slug}``` &rarr; Show translation
 * **PUT** ```/translation/{slug}``` &rarr; Update translation
 * **DELETE** ```/translation/{slug}``` &rarr; Delete translation
 * **GET** ```/translation/{slug}/edit``` &rarr; Edit translation
 * **GET** ```/search/translation``` &rarr; Search translations
 * **POST** ```/search/translation``` &rarr; Query translations
 * **GET** ```/term``` &rarr; Lists all term
 * **GET** ```/list/term``` &rarr; Returns JSON of all term
 * **POST** ```/term``` &rarr; Stores new term
 * **GET** ```/term/{slug}``` &rarr; Show term
 * **PUT** ```/term/{slug}``` &rarr; Update term
 * **DELETE** ```/term/{slug}``` &rarr; Delete term
 * **GET** ```/term/{slug}/edit``` &rarr; Edit term

All views can be found in ```/resources/views```.

### TODO

#### VueJS

Implement your [VueJS](https://vue.js) components in the folder ```/resources/js/components```.
Register your components in ```/resources/js/app.js``` and use them in the following files:

 * ```/resources/views/term```
     * ```/resources/views/term/create.blade.php```
     * ```/resources/views/term/edit.blade.php```
     * ```/resources/views/term/index.blade.php```
     * ```/resources/views/term/show.blade.php```
 * ```/resources/views/translation```
      * ```/resources/views/translation/create.blade.php```
      * ```/resources/views/translation/edit.blade.php```
      * ```/resources/views/translation/index.blade.php```
      * ```/resources/views/translation/search.blade.php```
      * ```/resources/views/translation/show.blade.php```

To query data for dropdowns in forms or to reload lists use the list routes:
 * **GET** ```/list/term```
 * **GET** ```/list/translation```

For the search form use ```q``` as the name for the text input.
The search will be handled by the backend.

#### CSS (SCSS)

The design of the software need to be adapted.
[Bulma](https://bulma.io) is used to layout and style the website.
If wanted default styles can be overwritten by setting variables in the ```/resources/sass/_variables.scss``` file.
Also it is possible to write custom styles in ```/resources/sass/_custom.scss```.

A new logo need to be set. If pictures will be present on the website place them in ```/public/img``` folder.
Here you will also find the logo.

### Hints

#### JavaScript and CSS (SCSS)

To compile scss and JavaScript ```npm run dev``` need to be executed in the project folder.
It is also possible to run ```npm run watch``` so it is not need to execute ```npm run dev``` every time a change happend.

#### Data for Database

To make starting developing fast there are some seeders implemented to fill all needed tables except the user table.
To populate the database run the command ```php artisan db:seed``` in the terminal in project root folder.
