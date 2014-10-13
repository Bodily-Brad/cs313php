<?php
$dbHost = "http://php-cvergara.rhcloud.com";
$dbPort = 80;
$dbUser = "php";
$dbPassword = "php-pass-150864067";

// Temp stuff
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
          
echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n"; 