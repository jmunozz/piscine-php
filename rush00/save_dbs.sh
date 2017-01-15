#!/bin/bash

mysql_user=root
mysql_pass=root
 
bases=`mysql -u $mysql_user --password=$mysql_pass -e "show databases;" -B -s 2> /dev/null`
 
if [ -z "$bases" ];then
        echo "Erreur d'accès ou pas de bases"
        exit 1
fi
 
echo "Début de la sauvegarde"
for base in $bases
do
        echo "Sauvegarde de $base..."
        mysqldump -u $mysql_user --password=$mysql_pass "$base" > $base.sql
done
 
echo "Sauvegarde terminée"

