#!/usr/bin/env bash
docker-compose up -d
docker exec -w /var/www/html app sh -c "composer install"
