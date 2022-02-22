# LifeRaft Code Test

A jumpstart for the LifeRaft code test

## Getting started

This repository is intended to act as a starting point for your code test. Fork this repo, then flesh it out with your own code.
```
Install the Laravel App composer install on directory API/src
Install the Node App npm install on directory UI/src
```

You can make any changes to what is provided that you see fit. This entire repo is intended as a convenience. You are not *required* to use it.

## Add your files
The `./API` folder is where you will write the **server** portion of the code test. `./UI` will store the **React** portion.

## Run with Docker
To run your project, simply run `docker-compose up` in your terminal. Press `Ctrl+C` to stop it.

The `Dockerfile`s are already configured to handle all the Apache server work. You just need to provide the PHP code.

The API docker container is configured to listen on port `80`. The UI container uses `3001`.

