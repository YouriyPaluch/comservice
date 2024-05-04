FROM node:lts-bullseye
WORKDIR /opt
RUN npm install -g npm \
    && npm install -g gulp-cli \
    && apt-get purge && apt-get clean

# Environment settings
ENV TERM=linux
ENV COMPOSER_ALLOW_SUPERUSER 1