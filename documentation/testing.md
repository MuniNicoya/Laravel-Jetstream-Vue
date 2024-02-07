
#Instructions for Testing and Generating Coverage Reports
--------------------------------------------------------
This README provides step-by-step instructions for setting up the testing environment, running tests, and generating coverage reports. It also includes explanations for each step to ensure clarity.

1. Run the following commands to set up your testing environment:

   ```
   php artisan migrate:fresh --env=testing
   php artisan db:seed --env=testing
   ```

   These commands will migrate your testing database and seed it with data required for testing.

2. To run tests without generating coverage reports, execute:

   ```
   composer test
   ```

   This command will execute your tests but won't generate a coverage report.

3. To generate a coverage report:

   a. Ensure that the HERD server and your local MySQL instance are stopped.

   b. Use Sail for running tests and generating coverage reports. If you haven't set up Sail, you can install and configure all requirements locally.

   c. Run `PHP -i` in your terminal and copy the output.

   d. Go to https://xdebug.org/wizard and paste the copied output. Follow the instructions to configure Xdebug properly.

   e. Once Xdebug is configured, run the following commands:

      ```
      sail up
      sail test --coverage-html /tests/coverage
      ```



https://medium.com/@anowarhossain/code-coverage-report-in-laravel-and-make-100-coverage-of-your-code-ce27cccbc738