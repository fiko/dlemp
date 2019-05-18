# DLEMP

A basic LEMP stack for web development build for Docker. DLEMP stands for:

**D**ocker + **L**inux + **E**ngine-X(NGINX) + **M**ySQL(MariaDB) + **P**HP(7.2)

## How to use?

1. Install Docker Compose on your computer:  
   (why docker-compose? I think it's easier than _docker run_. But you can use docker instead).  
   https://docs.docker.com/compose/install/  

2. Get or Clone this repository to your computer.  
   > $ git clone https://github.com/fikoborizqy/dlemp.git  

3. Start your server for the first time by this code.  
   > $ cd dlemp  
   > $ docker-compose up -d  

4. Open your browser and go to this link `http://localhost`

5. Customize your information of server such as `VIRTUAL_HOST`, `MYSQL_ROOT_PASSWORD`, `MYSQL_USER`, `MYSQL_PASSWORD`, etc on `docker-compoe.yml` file.

### Multiple Sites by Domain(Optional)

If you wish to access your docker project via domain **example.test** instead of **localhost:13001**. You can follow this steps.

1. Add your domain to your hosts. Example if you want to have domain `example.test`. copy this at the end of file of hosts file:  
```
127.0.0.1    example.test
```  
Where can I find my `hosts` file? You can follow [this instruction](https://www.mgt-commerce.com/documentation/mgt-development-environment-usage-host-file).

2. Update docker comfiguration. Open your `docker-compose.yml` file, fine this source:
```
...
ports:
    - 80:80
#    - 443:443
volumes:
    - ./public_html/:/var/www/html/
    - ./nginx/logs/:/var/log/nginx/
    - ./nginx-server.conf:/etc/nginx/conf.d/default.conf
links:
    - mysql
# You can change this virtual host to something else which you prefer such as project.test etc...
environment:
    VIRTUAL_HOST: localhost
...
```
remove the `ports` and change `VIRTUAL_HOST` value to `example.test`. So it become:
```
...
volumes:
    - ./public_html/:/var/www/html/
    - ./nginx/logs/:/var/log/nginx/
    - ./nginx-server.conf:/etc/nginx/conf.d/default.conf
links:
    - mysql
# You can change this virtual host to something else which you prefer such as project.test etc...
environment:
    VIRTUAL_HOST: example.test
...
```

3. Update Nginx configurtaion. Open `nginx-server.conf`, find this:
```
...
# Change server_name for the local domain you choose, 
# THIS HAVE TO MATCH to VIRTUAL_HOST on docker-compose.yml.
server_name localhost;
...
```
update it become `example.test`
```
...
# Change server_name for the local domain you choose, 
# THIS HAVE TO MATCH to VIRTUAL_HOST on docker-compose.yml.
server_name example.test;
...
```

4. Run docker nginx proxy server on terminal. (Run it only once!)
```
$ docker rm fikoborizqy-proxy; docker run --name=fikoborizqy-proxy --restart=always --net=bridge -d -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock:ro jwilder/nginx-proxy
```

5. Run your site:
```
$ docker-compose up
```


## Repository Map

Here's the default files you will get once you clone it to your computer:  
(Once you started the server, serveral files will create.)  

```
dlemp/
├── public_html/
│   ├── css/
│   │   └── style.css
│   ├── connect.php
│   ├── index.php
│   ├── phpinfo.php
│   └── server.php
├── .gitignore
├── docker-compose.yml
├── nginx-server.conf
└── README.md
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/) &copy; 2019

