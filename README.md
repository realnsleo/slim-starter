# PHP Slim3 Starter Project

I use this Slim Skeleton whenever starting a new PHP Slim project. I am hoping it will be useful for anyone starting out with Slim. You can call this a fullstack boilerplate for
 Slim 3.
 
 ## Getting started
 
 These instructions will get you a copy of the project up and running on your local machine for development purposes. Currently I have not included any deployment instructions 
 but if you are interested let me know.

### Prerequisites

This is what you will need to run this project:

* [Docker](https://www.docker.com/) - Used to run the Project
* [Composer](https://getcomposer.org/) - PHP Dependency Management

### Installing

First, you need to have both docker and composer up and running on your local development machine. In case you don't want to have composer, I will include instructions of how to
 use your dockerfile to install composer dependencies.
 
 If you have composer, start by running the following command in the root directory of the project.

```
composer install
```

After, it's as easy as running the command below. Again, in the root of your project.

```
docker-compose up
```

Once your services boot up, navigate to `http://localhost:8080` to view your Slim Application. You can also try the following URLs:

```
http://localhost:8080/Test
http://localhost:8080/api/movies
http://localhost:8080/api/movies/1
```

### No composer?

If you don't want to have composer installed in your machine, I have included a different Dockerfile that can be found in `./docker/dev/No-Composer-Dockerfile`. Simply copy the 
Dockerfile in that directory and replace the one in the parent directory.

Once this is done, you can run `docker-compose up` or if you have already ran it before, simply shut down the previous services using `docker-compose down` and then run 
`docker-compose
 up --build` and wait for the services to boot up.


## Deployment

If you need a way to deploy this project for example to AWS Fargate, Kubernetes etc, let me know.

## License

Anyone is free to use and modify this code as they see fit :)

## Misc
For any issues, please let me know so I can fix them. I will keep improving this boilerplate. Let me know which features you would like me to add. Thanks!