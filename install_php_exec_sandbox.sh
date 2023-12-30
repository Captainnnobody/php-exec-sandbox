#!/bin/bash

# Install Apache2
sudo apt-get update
sudo apt-get install -y apache2

# Copy the PHP file to the web server directory
sudo cp phpexecsandbox.php /var/www/html/index.php

# Delete the default index.html file
sudo rm /var/www/html/index.html

# Restart Apache to apply changes
sudo systemctl restart apache2

echo "Installation complete. Access the PHP Exec Sandbox at http://your-server-ip/ or http://localhost/"

