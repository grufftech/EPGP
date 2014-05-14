# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$script = <<SCRIPT
echo I am provisioning...
sudo apt-get update
sudo apt-get install git -y
sudo apt-get install curl -y
sudo apt-get install vim -y
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get update
sudo apt-get -y install lamp-server^
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "https://vagrantcloud.com/hashicorp/precise64/version/2/provider/virtualbox.box"
  config.vm.network :forwarded_port, guest: 80, host: 80 # Web Port
  config.vm.network :forwarded_port, guest: 443, host: 443 # SSL Web Port
  config.vm.network :forwarded_port, guest: 3306, host: 3306 # SSL Web Port
  config.vm.provision "shell", inline: $script
end

