# PHP Contributing [WIP]

<div align="center">
  <img src="https://github.com/user-attachments/assets/38dd5ae4-c106-4002-880e-ed0a0d630de2" alt="golang">
</div>
Welcome to the PHP Contributing project! This project aims to provide a friendly way to find new open source tasks to contribute to.

## Table of Contents

- [About the Project](#about-the-project)
- [Getting Started](#getting-started)
  - [Local Setup](#local-setup)
  - [Docker Setup with Sail](#docker-setup-with-sail)
- [Authentication Configuration (GitHub)](#authentication-configuration-github)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project

PHP Contributing is designed to help new contributors find beginner-friendly issues in open source projects, making it easier to start contributing to the open source community.

## Getting Started
1. Clone the repository:
   ```sh
   git clone https://github.com/Danielopes7/php-contributing.git
   ```
   ```sh
   cd php-contributing
   ```

   Copy the example environment file and set up the environment variables:
2. **Copy the example environment file and set up the environment variables:**

   ```sh
   cp .env.example .env
   ```
3. **Install dependencies using Composer:**

   ```sh
   composer install
   ```
### Local Setup🔧
5. **Generate the application key and run database migrations:**
   ```sh
   php artisan key:generate
   ```
   ```sh
   php artisan migrate
   ```
6. **Install front-end dependencies and start the development environment:**

    ```sh
   php npm install
   ```
   ```sh
   php npm run dev
   ```
6. **Start the Laravel development server:**
   ```sh
   php artisan serve
   ```
   Visit http://localhost:8000 to see the application in action.
### Docker Setup with Sail🐳
If you prefer running the project in Docker using Laravel Sail, follow these steps:

5. **Build and start the Docker container using Laravel Sail:**

   ```sh
   ./vendor/bin/sail up
   ```
   ```sh
   ./vendor/bin/sail artisan key:generate
   ```
   ```sh
   ./vendor/bin/sail artisan migrate
   ```
    ```sh
   ./vendor/bin/sail npm install
   ```
   ```sh
   ./vendor/bin/sail npm run dev
   ```
   Visit http://localhost to see the application in action.

### Authentication Configuration (GitHub)🔐
Before running the project, you need to configure authentication settings for GitHub.

This project uses **[Laravel GitHub](https://github.com/GrahamCampbell/Laravel-GitHub)** to interact with the GitHub API.
Laravel GitHub requires connection configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="GrahamCampbell\GitHub\GitHubServiceProvider"
```

This will create a `config/github.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

There are two config options:

##### Default Connection Name

This option (`'default'`) is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `'main'`.

##### GitHub Connections

This option (`'connections'`) is where each of the connections are setup for your application. Example configuration has been included, but you may add as many connections as you would like. Note that the 5 supported authentication methods are: `"application"`, `"jwt"`, `"none"`, `"private"`, and `"token"`.

##### HTTP Cache

This option (`'cache'`) is where each of the cache configurations setup for your application. Only the "illuminate" driver is provided out of the box. Example configuration has been included.



## Contributing
We welcome contributions from the community!

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Contact
If you have any questions or feedback, feel free to reach out by creating an issue in the repository.






