# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$script = <<SCRIPT
echo \n\n\n\n\n
echo ==============================================================================
echo I am updating and installing server software...
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get update
sudo apt-get install git -y
sudo apt-get install curl -y
sudo apt-get install vim -y
sudo apt-get install lamp-server^ -y 
sudo apt-get install php5-mcrypt -y


echo \n\n\n\n\n
echo ==============================================================================
echo I am preparing the database...
sudo sed -i.bakg 's/bind-address/#bind-address/g' /etc/mysql/my.cnf
mysql -uroot -prootpass -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'rootpass' WITH GRANT OPTION"
mysqladmin -u root -prootpass create tdt_epgp
sudo service mysql restart


echo \n\n\n\n\n
echo ==============================================================================
echo I am setting up apache...
sudo a2enmod rewrite
 echo 'echo "<VirtualHost *:80>
        DocumentRoot /vagrant/public/
        <Directory />
                Options FollowSymLinks
                AllowOverride All
        </Directory>
        <Directory /vagrant/public>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        LogLevel warn
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
" > /etc/apache2/sites-enabled/000-default' | sudo sh
sudo service apache2 restart



echo \n\n\n\n\n
echo ==============================================================================
echo I am installing composer & downloading dependencies...
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
cd /vagrant
composer install --prefer-source --no-interaction
php /vagrant/artisan migrate --seed
mkdir -p /vagrant/app/storage/meta
mkdir -p /vagrant/app/storage/cache
mkdir -p /vagrant/app/storage/sessions
mkdir -p /vagrant/app/storage/views
mkdir -p /vagrant/app/storage/logs
chmod -Rf 777 /vagrant/app/storage/


echo \n\n\n\n\n
echo ==============================================================================
echo I am done! check it out:  http://localhost:80
echo I am done! check it out:  https://localhost:443
echo \n\n\n\n\n
echo I am designed to respond to any domain you point at me.\n\n
echo You can connect to MySQL on localhost:3306, User: root, Password: rootpass
echo For security, it is highly recommended to change the default password. 
echo ==============================================================================
echo \n\n\n\n\n
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "https://vagrantcloud.com/hashicorp/precise64/version/2/provider/virtualbox.box"
  config.vm.network :forwarded_port, guest: 80, host: 80 # Web Port
  config.vm.network :forwarded_port, guest: 443, host: 443 # SSL Web Port
  config.vm.network :forwarded_port, guest: 3306, host: 3306 # MySQL Port
  config.vm.provision "shell", inline: $script
end

