FROM node:12
COPY ./package.json /srv/package.json
COPY ./package-lock.json /srv/package-lock.json
WORKDIR /srv/
RUN npm install
