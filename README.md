docker volume ls
docker volume ls
docker volume rm <volume_name>
docker images | docker image ls
docker image rm <image_id> ..
docker ps
docker ps -a
docker-compose up -d
docker exec -it <container_id> <command> eg bash
docker-compose rm -s && docker-compose up --build -d
docker stop $(docker ps -a -q)
docker-compose down

composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition:2.4.3 . --prefer-dist --no-interaction
php bin/magento setup:install --base-url="http://localhost:8010/" --db-host="mariadb" --db-name=cbd_source --db-user=root --db-password=password --admin-firstname="Rakesh" --admin-lastname="Jangir" --admin-email="rakesh.jangir@ftxinfotech.com" --admin-user="admin" --admin-password="Admin@123_4" --use-rewrites="1" --backend-frontname="admin" --db-prefix=mage_ --elasticsearch-host=elasticsearch --elasticsearch-port=9200

bin/magento sampledata:deploy
bin/magento setup:upgrade   OR  php bin/magento s:up
bin/magento indexer:reindex
bin/magento cache:flush     OR  php bin/magento c:f

Change db config: etc/env.php
Update URL in DB:
    UPDATE core_config_data SET value='http://localhost:8004/' WHERE path='web/unsecure/base_url';

sudo php bin/magento setup:di:compile && sudo php bin/magento setup:static-content:deploy -f && sudo php bin/magento cache:clean && bin/magento cache:flush

php bin/magento setup:di:compile && php bin/magento setup:static-content:deploy -f && php bin/magento cache:clean && bin/magento cache:flush
