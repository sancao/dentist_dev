<?php

namespace App\Repositories;

interface CompanyInterface
{
    public function getCompanies($user_id=0,$text);
    //https://www.howtoforge.com/tutorial/ubuntu-laravel-php-nginx/
    //aK256XPxQ2ElVoXPHrCwtYg11vPvuonHPrs9YCJ0ndc
}


// server {
//     listen 80;
//     listen [::]:80 ipv6only=on;

//     # Log files for Debugging
//     access_log /var/log/nginx/dentist_dev-access.log;
//     error_log /var/log/nginx/dentist_dev-error.log;

//     # Webroot Directory for Laravel project
//     root /var/www/dentist_dev/public;
//     index index.php index.html index.htm;

//     # Your Domain Name
//     server_name dentist.co;

//     location / {
//             try_files $uri $uri/ /index.php?$query_string;
//     }

//     # PHP-FPM Configuration Nginx
//     location ~ \.php$ {
//             try_files $uri =404;
//             fastcgi_split_path_info ^(.+\.php)(/.+)$;
//             fastcgi_pass unix:/run/php/php7.2-fpm.sock;
//             fastcgi_index index.php;
//             fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
//             include fastcgi_params;
//     }
// }