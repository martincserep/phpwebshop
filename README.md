# PHP WEBSHOP
This is a webshop, built in php and custom css.


## How to use?

Clone this repository on your local computer and switch to branch `docker-master`. Run the `docker-compose up -d`.


```shell

git clone https://github.com/martincserep/phpwebshop.git

cd phpwebshop/

git checkout docker-master

cp sample.env .env

docker-compose up -d

```

Your LAMP stack is now ready!! You can access it via `http://localhost`.

>When you are done, use `docker-compose down` to shut down containers.