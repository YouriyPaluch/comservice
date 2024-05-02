# Symfony Docker installer

## About 
 - Symfony 7.0.*@dev
 - php-fpm 8.3
 - Mysql latest
 - nginx latest

## Installation
### Step 1
Copy `.env.install.dist` file to `.env.install`

Change `PROJECT_NAME` in `.env.install`


Change Line Separator for files

 - project.sh
 - docker/web/symfony_install.sh
 - .env.install

to LF (Unix and MAcOS(\n))


### Step 2
```console
/bin/bash project.sh
```

This may take a few minutes. Wait for completion.

### Step 3
Profit

## Use

For use 
```console
/bin/bash project.sh
```