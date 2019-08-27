# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"

  config.vm.define "websiteserver" do |websiteserver|

    #Naming the websiteserver
    websiteserver.vm.hostname = "websiteserver"
  
    # Create a forwarded port mapping which allows access to a specific port
    # within the machine from a port on the host machine and only allow access
    # via 127.0.0.1 to disable public access
    websiteserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    #Other VMs will follow form of 192.68.33.x with x = 10,11,12 (for our 3 VMs)
    websiteserver.vm.network "private_network", ip: "192.168.33.10"

    #Synced folder to work on host machine
    websiteserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Enable provisioning with a shell script. (Could move this into seperate file)
    websiteserver.vm.provision "shell", path: "webscript.sh"
  end

  config.vm.define "queryserver" do |queryserver|

    #Naming the querysever 
    queryserver.vm.hostname = "queryserver"

    queryserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"

    #Setting up the network for queryserver
    queryserver.vm.network "private_network", ip: "192.168.33.12"

    #Synced folder to work on host machine
    queryserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    #External provisioning script that defines the queryserver
    queryserver.vm.provision "shell", path: "querysitescript.sh"
  end
    
  config.vm.define "dbserver" do |dbserver|

    #Naming the database servers
    dbserver.vm.hostname = "dbserver"
	
    #Seperate IP from the website server (have incremented it 1)
    dbserver.vm.network "private_network", ip: "192.168.33.11"

    #Synced folder to work on host machine
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    #External provisioning script that defines the database server
    dbserver.vm.provision "shell", path:"dbserverscript.sh"
  end
end

