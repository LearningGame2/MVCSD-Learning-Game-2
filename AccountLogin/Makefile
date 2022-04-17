USER= Game2

all: PutHTML

PutHTML:
		cp LoginAuth.php /var/www/html/class/ssd/$(USER)/LoginPageTest/
		cp welcome.php /var/www/html/class/ssd/$(USER)/LoginPageTest/
		cp logout.php /var/www/html/class/ssd/$(USER)/LoginPageTest/
		cp session.php /var/www/html/class/ssd/$(USER)/LoginPageTest/

		echo "Current contents of your HTML directory: "
		ls -l /var/www/html/class/ssd/$(USER)/LoginPageTest/