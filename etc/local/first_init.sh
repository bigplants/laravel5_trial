#!/bin/bash

red="\033[1;31m"  #赤
gre="\033[1;32m"  #緑
whit="\033[0m"   #ホワイト
blu="\033[1;34m"  #青

TIME_A=`date +%s`

if [ -e .env ]; then
  echo "${red}*** This is executable at only first time!${whit}"
  exit 1
fi

echo "${blu}### Initiarize Application. ###${whit}"
echo "*** cp .env.example .env"
cp .env.example .env
echo "*** composer install"
composer install
echo "*** php artisan key:generate"
php artisan key:generate
echo "*** composer update"
composer update

TIME_B=`date +%s`   #B
PT=`expr ${TIME_B} - ${TIME_A}`
H=`expr ${PT} / 3600`
PT=`expr ${PT} % 3600`
M=`expr ${PT} / 60`
S=`expr ${PT} % 60`

echo "${gre}*** All Done!${whit}"
echo "*****************************"
printf "Total Time: %02d:%02d:%02d\n" ${H} ${M} ${S}
echo "*****************************"
echo ""
echo "${blu}Enjoy Development!${whit}"

