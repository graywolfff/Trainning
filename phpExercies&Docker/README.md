# PHP 1 - exerises 

Docker example with Apache, MySql 8.0, PhpMyAdmin and Php

- Lưu ý version docker nên là 2.5.0 (không chạy đc trên version 3).
- default view page localhost:8001
- admin page localhost:8001/admin/show

I use docker-compose as an orchestrator. To run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://localhost:8000](http://localhost:8000)
Open web browser to look at a simple php example at [http://localhost:8001](http://localhost:8001)

Run mysql client:

- `docker-compose exec db mysql -u root -p`

Enjoy !
