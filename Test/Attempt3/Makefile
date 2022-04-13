#MakeFile to build and deploy the Sample US CENSUS Name Data using ajax
# For CSC3004 Software Development

USER= Game2

all: PutCGI PutHTML

PutCGI:
		chmod 757 validate.js
		cp validate.js /usr/lib/cgi-bin/$(USER)_validate.js

		echo "Current contents of your cgi-bin directory: "
		ls -l /usr/lib/cgi-bin/

PutHTML:
		cp Connection.php /var/www/html/class/ssd/$(USER)/LGAttempt3/
		cp Game.php /var/www/html/class/ssd/$(USER)/LGAttempt3/
		cp Home.php /var/www/html/class/ssd/$(USER)/LGAttempt3/
		cp Login1.html /var/www/html/class/ssd/$(USER)/LGAttempt3/
		cp LoginSyle.css /var/www/html/class/ssd/$(USER)/LGAttempt3/
		cp validate.js /var/www/html/class/ssd/$(USER)/LGAttempt3/

		echo "Current contents of your HTML directory: "
		ls -l /var/www/html/class/ssd/$(USER)/LGAttempt3/
