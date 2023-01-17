<div align="center">
  <!-- PROJECT LOGO -->
  <a href="https://github.com/SageITSolutions/salesforce-rest">
    <img src=".readme/logo.png" alt="Logo" width="445" height="120">
  </a>

  <h1 align="center">Phalcon REST</h1>

[![Latest Stable Version](http://poser.pugx.org/sageit/salesforce-rest/v?style=plastic)](https://packagist.org/packages/sageit/salesforce-rest)
[![Total Downloads](http://poser.pugx.org/sageit/salesforce-rest/downloads?style=plastic)](https://packagist.org/packages/sageit/salesforce-rest)
[![License](http://poser.pugx.org/sageit/salesforce-rest/license?style=plastic)](https://packagist.org/packages/sageit/salesforce-rest)
[![PHP Version Require](http://poser.pugx.org/sageit/salesforce-rest/require/php?style=plastic)](https://packagist.org/packages/sageit/salesforce-rest)
[![Phalcon Version](https://img.shields.io/packagist/dependency-v/sageit/salesforce-rest/ext-phalcon?label=Phalcon&logo=Phalcon%20Version&style=plastic)](https://packagist.org/packages/sageit/salesforce-rest)

  <p>
    Library for consuming Salesforce REST API via GuzzleHttp
  </p>

**[Explore the docs »](https://github.com/SageITSolutions/salesforce-rest)**

**[Report Bug](https://github.com/SageITSolutions/salesforce-rest/issues)** ·
**[Request Feature](https://github.com/SageITSolutions/salesforce-rest/issues)**

</div>

<!-- TABLE OF CONTENTS -->

## Table of Contents

- [Table of Contents](#table-of-contents)
- [About The Project](#about-the-project)
  - [Built With](#built-with)
- [Installation](#installation)
- [Implementing a Service](#implementing-a-service)
- [Sections](#sections)
- [Roadmap](#roadmap)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

<br />

<!-- ABOUT THE PROJECT -->

## About The Project

### Built With

- [vscode](https://code.visualstudio.com/)
- [Postman](https://www.postman.com/)
- [php 8.1.1](https://www.php.net/releases/8_1_1.php)
- [Phalcon 5](https://phalcon.io/en-us) (Micro Framework)

<br />

<!-- GETTING STARTED -->

## Installation

**Git:**

```sh
git clone https://github.com/SageITSolutions/salesforce-rest.git
```

**Composer:**

```sh
composer require sageit/salesforce-rest
```

<br />

<!-- USAGE EXAMPLES -->

## Implementing a Service

This project consists of prebuild services that simply need to be added to DI for services.
JWT assumes the presense of a config object in the DI with a JWT section. This can also be passed as a named array in the constructor, but the provided JWT service does not utilize this.

**Config Register**

One option is to have your application iterate services listed in the config object and register them

```yaml
services:
  tools: Phalcon\Di\Service\Common\Tools
  request: Phalcon\Di\Service\Request\Json
  response: Phalcon\Di\Service\Response\Json
  jwt: Phalcon\Di\Service\Encryption\Security\JWT\Jwt
```

```php
foreach ($config->services as $service => $class) {
  $di->register(new $class);
}
```

**Register Manually**

```php
$di->register(new \Phalcon\Di\Service\Common\Tools());
$di->register(new \Phalcon\Di\Service\Request\Json());
$di->register(new \Phalcon\Di\Service\Response\Json());
$di->register(new \Phalcon\Di\Service\Encryption\Security\JWT\Jwt());
```

<br />

<!-- SECTIONS -->

## Sections

- [Tools](TOOLS.md)
- [JSON Headers](JSON.md)
- [JWT Encryption](JWT.md)
- [Middleware](MIDDLEWARE.md)

<!-- ROADMAP -->

## Roadmap

See the [open issues](/issues) for a list of proposed features (and known issues).

<br />

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<br />

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE` for more information.

<br />

<!-- CONTACT -->

## Contact

Sage IT Solutions - [Email](mailto:daniel.davis@sageitsolutions.net)

Project Link: [https://github.com/SageITSolutions/salesforce-rest](https://github.com/SageITSolutions/salesforce-rest)
