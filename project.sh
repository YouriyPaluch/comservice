#!/bin/sh
if test -f "${WORKDIR}/.env"; then
      echo 'Run';
      docker-compose --env-file .env.local up;
    else
      echo 'Installation';
      docker-compose --env-file .env.install up --build;
fi