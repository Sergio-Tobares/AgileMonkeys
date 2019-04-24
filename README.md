Yii 2 PHP Api
===============================

The template is designed to work in a team development environment. It supports
deploying the application in different environments.
DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

The goal of the project is to develop a backend aplication that allows users to list, view, edit and delete customers.

The customer data has to contain the following information, Name, Surnname, Id and Photo field. In adition, all customers will have a reference to whom created the 
register and the last one that updated the info, also the creation date time and the update date time.

The admin users, also can create and change status of the other users, edit the info or delete a user account.

A github repositorie has been created https://github.com/Sergio-Tobares/agilemonkeys to share the code.

The users can signup in the aplication, but their status will be Pending as long as an Admin user don't validate them. Meanwhile they can login into the aplicaton
but can only se their profile.
Users can algo reset the password , this will send an email with further instructions and a link to change the password and login again.  
When their status change and become a validated user they will be able to see all customers and perform the operations as described before.

The customer data allow to upload images to their profile, as a test it was limited to just the jpg format. This image is resized and can be updated any time.

The delete option in the users and customers, is only shown when the user is view, this was a limitation used just as a example.