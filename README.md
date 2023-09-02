I don't really do PHP, but I've been maintaining this project
that I didn't write for a couple of years now.

So, I'm open sourcing it. Pull requests are very welcome.


## Development

1) Set up database

```
docker pull mariadb:10.4
docker run --name mariadbtest -e MYSQL_ROOT_PASSWORD=mypass -p 3306:3306 -d docker.io/library/mariadb:10.4
```

2) Set up schema

```
create database WHATstats;

create table if not exists usernames (
	id int NOT NULL AUTO_INCREMENT,
	username text,
	userid int,
	PRIMARY KEY (id)
);

create table if not exists statistics (
	id int NOT NULL AUTO_INCREMENT,
	username text,
	ratio float,
	downloaded bigint,
	downType text,
	uploaded bigint,
	upType text,
	buffer BIGINT,
	buffType text,
	uploads int,
	snatched int,
	leeching int,
	seeding int,
	forumPosts int,
	torrentComments int,
	date TIMESTAMP default CURRENT_TIMESTAMP,
	hourlyRatio float,
	PRIMARY KEY (id)
);
```

3) Update sekrit.php with these values