# Update Ubuntu software packages.
apt-get update

# We create a shell variable MYSQL_PWD that contains the MySQL root password
export MYSQL_PWD='password1'

echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

# Install the MySQL database server.
apt-get -y install mysql-server

#Added for easier provisioning
echo "DROP DATABASE IF EXISTS jacksdb;" | mysql
echo "DROP USER IF EXISTS 'jackuser1', remote;" | mysql

# Create database that will contain tables
echo "CREATE DATABASE jacksdb;" | mysql

# Then create a database user "jackuser1" with the given password.
echo "CREATE USER 'jackuser1'@'%' IDENTIFIED BY 'password1';" | mysql

echo "GRANT ALL PRIVILEGES ON jacksdb.* TO 'jackuser1'@'%'" | mysql

# Export password
export MYSQL_PWD='password1'

#add user jackuser1 and jacksdb
cat /vagrant/testdb.sql | mysql -u jackuser1 jacksdb

# The /0.0.0.0/ allows for public connections to occur
sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Restart for configuration comments
service mysql restart
