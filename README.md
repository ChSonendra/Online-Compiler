# Online Compiler
this is an online compiler. currently it supports 3 programming languages. i am working on the project and soon it will be supporting a large no. of languages.
this project is build using open source compiler images and it works on entirely on Container Technology to save cost and time.
PHP language is used to create an interface between 'user and apache server' and 'apache server and Docker Engine'.
this project is free to use...and feedback realated to bugs, fixes, updatation and features is highly appreciable.
thanku...

STEPS TO SET UP THE THIS PROJECT  

1) this project is designed to be hosted on linux system...so make sure you are on linux.
2) download and install APACHE SERVER from https://www.apachefriends.org/index.html for linux.
3) paste the files you get out of this repository in to the /var/www/html/ folder
4) now install docker from docker from https://docs.docker.com/get-docker/
5) after installing docker set the environment as follows to let the apache server talk to docker.
5.1) this can be done in two ways...either we make docker's permission to 777 and anyone can run commands on docker.
5.2) second way is to allow apache to run sudo command without using password so that it can start build create run docker and docker containers.
7)run this command and find "cat /etc/passwd" and look for "www-data".
6)now you need to edit /etc/sudoers file and this file can be edited only with VI (VIM) so run command "vi /etc/sudoers"
7)after this add this line into the file "%www-data ALL=(ALL) NOPASSWD: bin/docker" .
8) point 7 will enable apache server to run all docker commands without a password.
9) pull 2 images from docker hub with these commands... "sudo docker pull gcc", "sudo docker pull open-jdk"
and 
everything is done...
start your apache server with command "sudo systemctl start apache2"
and start your docker engine with "sudo systemctl start docker"
and access your site as usual with http://localhost/interface.php
Thanks and hope you find this thing useful.
