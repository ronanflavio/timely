## Installation

This project was developed with Laravel 8 and has its same minimum requirements for installation.

The only additional dependency is the package [Spatie - Data Transfer Object](https://github.com/spatie/data-transfer-object).

Follow the steps below to install the application:

* ``` git clone https://github.com/ronanflavio/timely.git ```

* ``` cd timely ```

* ``` composer install ```

Now you need to create your environment configurations. To do that, create your `.env` file making a copy from the `.env.example` file in the project's root directory.

With the `.env` file created, run the command below to generate your project key:

* ``` php artisan key:generate ```

## PHPUnit usage

Use the command below to run the test cases:

* ``` php artisan test ```

The command will execute all the test cases created.

## REST usage

If you want to use the application through a REST client, you need to configure the local environment with your database.

Open the `.env` file in an editor and set the database environment variables.

With your database configured, just run the command below to migrate and seed:

* ``` php artisan migrate --seed ```

This command will generate the database and seed five Organizers with IDs from 1 to 5 to enable testing from a REST client.

### Available endpoints

* Create Event: ``` POST /api/events ```
    
    Request body example:
    
    ```
    {
        "title" : "Title of the event",
        "description" : "Long description goes here.",
        "start_datetime" : "2021-12-25 18:00:00",
        "end_datetime" : "2021-12-25 23:59:59",
        "organizers" : [1,2,3,4]
    }
    ```

* Retrieve Event: ``` GET /api/events/:id ```

* Update Event: ``` PUT /api/events/:id ```

    Request body example:
    
    ```
    {
        "title" : "Title of the event updated",
        "description" : "Long description goes here.",
        "start_datetime" : "2021-12-25 17:00:00",
        "end_datetime" : "2021-12-25 22:00:00",
        "organizers" : [3,4]
    }

* Delete Event: ``` DELETE /api/events/:id ```

