# DLEMP

A basic LEMP stack for web development build for Docker. DLEMP stands for:

**D**coker + **L**inux + **E**ngine-X(NGINX) + **M**ySQL(MariaDB) + **P**HP(7.2)

## How to use?

1. Install Docker Compose on your computer:  
   (why docker-compose? I think it's easier than _docker run_. But you can use docker instead).  
   https://docs.docker.com/compose/install/  

2. Get or Clone this repository to your computer.  
   > $ git clone https://github.com/fikoborizqy/dlemp.git  

3. Start your server for the first time by this code.  
   > $ cd dlemp  
   > $ docker-compose up -d  

4. Open your browser and go to this link `http://localhost` or `http://YOUR_SERVER_IP`

5. Customize your information of server such as MYSQL_ROOT_PASSWORD, MYSQL

## Repository Map

Here's the default files you will get once you clone it to your computer:  
(Once you started the server, serveral files will create.)  

```
dlemp/
├── nginx/
│   └── conf.d/
│       └── default.conf
└── public_html/
│   ├── css/
│   │   └── style.css
│   ├── connect.php
│   ├── index.php
│   ├── phpinfo.php
│   └── server.php
├── .gitignore
├── docker-compose.yml
└── README.md
```