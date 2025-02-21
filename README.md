# PHP Contributing

Welcome to the PHP Contributing project! This project aims to provide a friendly way to find new open source tasks to contribute to.

## Table of Contents

- [About the Project](#about-the-project)
- [Getting Started](#getting-started)
  - [Docker Setup with Sail](#docker-setup-with-sail)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project

PHP Contributing is designed to help new contributors find beginner-friendly issues in open source projects, making it easier to start contributing to the open source community.

## Getting Started

### Docker Setup with Sail🐳

1. Clone the repository:
   ```sh
   git clone https://github.com/Danielopes7/php-contributing.git
   cd php-contributing

   Copy the example environment file and set up the environment variables:
   ```
2. **Copy the example environment file and set up the environment variables:**

   ```sh
   cp .env.example .env
   ```
3. **Install dependencies using Composer:**

   ```sh
   composer install
   ```
4. **Install dependencies using Composer:**

   ```sh
   composer install
   ```
5. **Build and start the Docker container using Laravel Sail:**

   ```sh
   ./vendor/bin/sail up
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate

   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run dev
   ```
   Visit http://localhost to see the application in action.


### Contributing
We welcome contributions from the community!

### License
This project is licensed under the MIT License. See the LICENSE file for details.

### Contact
If you have any questions or feedback, feel free to reach out by creating an issue in the repository.






