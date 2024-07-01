FROM composer

RUN docker-php-ext-install \
  mysqli \
  pdo \
  pdo_mysql

RUN docker-php-ext-enable \
  pdo_mysql

RUN apk update
RUN apk add entr tmux
RUN apk add nodejs npm

RUN mkdir /.npm
RUN chown -R 1000:1000 "/.npm"

# bcmath
# bz2
# calendar
# ctype
# curl
# dba
# dl_test
# dom
# enchant
# exif
# ffi
# fileinfo
# filter
# ftp
# gd
# gettext
# gmp
# hash
# iconv
# imap
# intl
# json
# ldap
# mbstring
# mysqli
# oci8
# odbc
# opcache
# pcntl
# pdo
# pdo_dblib
# pdo_firebird
# pdo_mysql
# pdo_oci
# pdo_odbc
# pdo_pgsql
# pdo_sqlite
# pgsql
# phar
# posix
# pspell
# random
# readline
# reflection
# session
# shmop
# simplexml
# snmp
# soap
# sockets
# sodium
# spl
# standard
# sysvmsg
# sysvsem
# sysvshm
# tidy
# tokenizer
# xml
# xmlreader
# xmlwriter
# xsl
# zend_test
# zip
