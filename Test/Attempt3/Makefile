#MakeFile to build and deploy the Sample US CENSUS Name Data using ajax
# For CSC3004 Software Development

# Put your user name below:
USER= Game2

all: PutCGI PutHTML

PutCGI:
        chmod 757 phoneApp.py
        cp phoneApp.py /usr/lib/cgi-bin/$(USER)_phoneApp.py

        echo "Current contents of your cgi-bin directory: "
        ls -l /usr/lib/cgi-bin/

PutHTML:
        cp phoneApp.html /var/www/html/class/ssd/$(USER)/LGAttempt3/
        cp phoneApp.css /var/www/html/class/ssd/$(USER)/LGAttempt3/
        cp phoneApp.js /var/www/html/class/ssd/$(USER)/LGAttempt3/

        echo "Current contents of your HTML directory: "
        ls -l /var/www/html/class/ssd/$(USER)/LGAttempt3/