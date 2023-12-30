# PHP Exec Sandbox

PHP Exec Sandbox is a simple web application that allows you to test PHP code in a secure and controlled environment. It provides a web-based interface where you can enter PHP code, and it will execute the code and display the output.

## Installation

### Clone Repository

**Clone the Repository:**
```bash
git clone https://github.com/Captainnnobody/php-exec-sandbox.git
cd php-exec-sandbox
```
### Automatic Installation (Bash Script):
```
chmod +x install_php_exec_sandbox.sh
./install_php_exec_sandbox.sh
```

### Manual Installation:

Copy PHP File to Web Server Directory:
```
sudo cp phpexecsandbox.php /var/www/html/index.php
```
Delete Default index.html File:
```
sudo rm /var/www/html/index.html
```

### Access the PHP Exec Sandbox
Open your browser and go to http://localhost/ to access the PHP Exec Sandbox.



## Usage
1. Open the PHP Exec Sandbox in your web browser.
2. Enter your PHP code in the provided textarea.
3. Click the "Run Code" button to execute the code.
4. View the output in the adjacent panel.
