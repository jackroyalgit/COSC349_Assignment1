# Update Ubuntu software packages.
apt-get update

# We create a shell variable MYSQL_PWD that contains the MySQL root password
export MYSQL_PWD='password1'

echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

# Install the MySQL database server.
apt-get -y install mysql-server

echo "DROP DATABASE IF EXISTS jacksdb;" | mysql
echo "DROP USER IF EXISTS 'jackuser1', remote;" | mysql

# Run some setup commands to get the database ready to use.
# First create a database.
echo "CREATE DATABASE jacksdb;" | mysql

# Then create a database user "jackuser1" with the given password.
echo "CREATE USER 'jackuser1'@'%' IDENTIFIED BY 'password1';" | mysql

echo "GRANT ALL PRIVILEGES ON jacksdb.* TO 'jackuser1'@'%'" | mysql

# Set the MYSQL_PWD shell variable that the mysql command will
# try to use as the database password ...
export MYSQL_PWD='password1'

#The mysql command specifies both
# the user to connect as (webuser) and the database to use (fvision).
cat /vagrant/testdb.sql | mysql -u jackuser1 jacksdb

#Allow public connection
sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# We then restart the MySQL server to ensure that it picks up
# our configuration changes.
service mysql restart
