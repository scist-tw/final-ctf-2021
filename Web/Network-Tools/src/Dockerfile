FROM php:8.0-apache

RUN apt-get update && apt-get install --no-install-recommends -y dnsutils inetutils-ping traceroute mtr whois && rm -rf /var/lib/apt/lists/*

COPY ./ /var/www/html/
