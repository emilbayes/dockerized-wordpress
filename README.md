`dockerized-wordpress`
=======================

This project shows how to run WordPress in a series of Docker containers for
development, and with some modification, in production.

Usage
-----

```sh
docker-compose up
```

**Note** `hostname` hardcoded into `docker-compose.yml` to set the correct `$_SERVER['SERVER_NAME']`

File structure
--------------

- `/mariadb` contains files for running the database server. This being SQL
  files with initial data and database configuration files.
- `/nginx` contains configuration for a Nginx reverse-proxy sitting in front of
  HHVM and doing URL rewriting, restricting access etc. This container has
  read access to the HHVM container's WordPress folder for serving static files.
- `/hhvm` contains configuration for HHVM, which is to be run in FastCGI mode.
  This is where the WordPress and theme files reside.

License
-------

[ISC](LICENSE)
