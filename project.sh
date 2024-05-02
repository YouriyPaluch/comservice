#!/bin/sh
if test -f .env; then
      echo 'Run';
      docker-compose --env-file .env.local up;
    else
      echo 'Installation';
      if test -f docker-compose.yaml; then
        rm docker-compose.yaml;
      fi
      cp docker-compose.yaml.install.example docker-compose.yaml;
      docker-compose --env-file .env.install up --build;
      rm docker-compose.yaml;
      cp docker-compose.yaml.example docker-compose.yaml;
fi