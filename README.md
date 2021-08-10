# **CVAARS Project**

#### Follow this instructions to setup this project on your local computer.

### Pre-Requirements

-   [Download and install composer](https://getcomposer.org/download/).
-   [Download and install git](https://git-scm.com/downloads).
-   Download and install any mqsql server ([MySQL workbench](https://dev.mysql.com/downloads/workbench/), [XAMPP](https://www.apachefriends.org/download.html), etc).
-   Download and install any code editor you like, I prefer [VS Code](https://code.visualstudio.com/).

### Watch these tutorials if you are not familiar with any.

-   [Work with Git](https://www.youtube.com/watch?v=USjZcfj8yxE)
-   [Work with GitHub](https://www.youtube.com/watch?v=PQsJR8ci3J0)
-   [Work with Visual Studio Code](https://www.youtube.com/watch?v=VqCgcpAypFQ)
-   [Basic Laravel](https://www.youtube.com/watch?v=ubfxi21M1vQ)

#### Installation

**Type these commands on your terminal**

Clone this project to your local computer.

```ps
git clone https://github.com/iPlexTechnology/CVAARS
```

Go to project folder.

```ps
cd CVAARS/
```

Install required packages.

```ps
composer install
```

create new .env file.

```ps
cp .env.example .env
```

Generate new app key.

```ps
php artisan key:generate
```

Now open your .env file and config MySQL database.

Run migrations.

```ps
php artisan migrate
```

Run the application.

```ps
php artisan serve
```

Now you can go to http://localhost:8000/ on your computer and see the application running.
