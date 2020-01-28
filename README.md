===============================================================================================

This repo consists a variety of ansible playbooks that are capable to perform following tasks:
  1. Deploy LAMP Server on CentOS 7.
  2. Build Dockerfile and run container on both CentOS and Ubuntu.
  3. Pull docker image from public registory and run container 
     on both CentOS and Ubuntu.

===============================================================================================

[ cent.yml ]
This playbook is for CentOS 7 machines that basically installs "epel-repo" that is required to install packages that are required for docker. After the installation docker service is started and enabled. A Dockerfile is cloned from "https://github.com/InfernoVirus/phpcalculator.git". The git repo name itself says that the Dockerfile consists of php code for calculator. After the repo is cloned, read write and execute permissions are given to the Dockerfile. Once the Dockerfile is universaly accessible it is ready to build image "php-cal" that is followed by running container of the same image. The container is named "php-calculator" and TCP port 18080 is mapped with port 80 which can be accessed by <aws_public_ip>:8080.

===============================================================================================

[ mario.yml ]
This playbook initially does the same as cent.yml: installs "epel-repo" and relevent packages from docker. An mario image is pulled from docker.io and run. TCP port 8600 is mapped with port 8080 which can be accessed by <aws_public_ip>:8600.

===============================================================================================

[ ubuntu.yml ]
This playbook is for Ubuntu machines whose first task is to configure repos for package installation simply by running a shell script "script.sh". The rest of the playbook is identical to that of cent.yml that:
 - starts docker serverice
 - clones git repo
 - builds Dockerfile
 - runs a container with 18080 port mapped to 80
and can be accessed by <aws_public_ip>:18080

===============================================================================================

[ lamp.yml ]
This playbook is for CentOS machines to configure LAMP Server.
A LAMP Server requires to install apache, mysql, php/perl/python.
In the begining all package installation and starting service jobs are performed. Immediately after that mysql-root-password is set to "redhat" and a "schoolinfo" named databse is created by user "root". Now "conn.php" (php connectivity file) is copied into the apache document root to enable database connectivity. Another file "query.txt" is nothing but a database query file which is fed to "schoolinfo" database with login credentials of user "root". At last an php website is hosted that can be accessed by <aws_public_ip>

===============================================================================================
