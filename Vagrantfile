# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"

  config.vm.define "websiteserver" do |websiteserver|
    
    websiteserver.vm.hostname = "websiteserver"
  
    # Create a forwarded port mapping which allows access to a specific port
    # within the machine from a port on the host machine and only allow access
    # via 127.0.0.1 to disable public access
    websiteserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    # Create a private network, which allows host-only access to the machine
    # using a specific IP.
  
    #Other VMs will follow form of 192.68.33.x with x = 10,11,12 (for our 3 VMs)
    websiteserver.vm.network "private_network", ip: "192.168.33.10"

    # Share an additional folder to the guest VM. The first argument is
    # the path on the host to the actual folder. The second argument is
    # the path on the guest to mount the folder. And the optional third
    # argument is a set of non-required options.
    # config.vm.synced_folder "../data", "/vagrant_data"
    websiteserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Enable provisioning with a shell script. (Could move this into seperate file)
    websiteserver.vm.provision "shell", path: "webscript.sh"
  end

  config.vm.define "queryserver" do |queryserver|

    queryserver.vm.hostname = "queryserver"

    queryserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"

    queryserver.vm.network "private_network", ip: "192.168.33.12"

    queryserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    queryserver.vm.provision "shell", path: "querysitescript.sh"
  end
    
  config.vm.define "dbserver" do |dbserver|
    dbserver.vm.hostname = "dbserver"
	
    #Seperate IP from the website server (have incremented it 1)
    dbserver.vm.network "private_network", ip: "192.168.33.11"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    dbserver.vm.provision "shell", path:"dbserverscript.sh"
  end
end

