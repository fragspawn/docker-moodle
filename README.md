### Docker-based Moodle

Build a docker development environment to Moodle on localhost
Configuration state of Moodle can be maintained in a git repo.
phpmyadmin container to be deleted on staging/production, as it allows unrestricted access to database

## Containers

* Moodle     - PHP/Apache instance to run Moodle code 
* Mariadb    - Database backend
* phpmyadmin - access to moodle database
* redis      - long-running sessions stored here
* Mariadb    - mysqldump process to dump moodle database

## Directory Structure

/php           - mods to php.ini file
/mariadb-conf  - mods to mariadb
/sql           - backup of sql database (manually run)
/moodle        - Moodle system
/moodle/public - Documentroot of Moodle 
/bin           - scripts & utilities
/staging       - scripts & utilities for staging

## installed software:
* (https://download.moodle.org/releases/latest/)
* (https://moodle.org/plugins/paygw_stripe)
* (https://moodle.org/plugins/availability_role)
* (https://moodle.org/plugins/mod_hvp)
* (https://moodle.org/plugins/auth_oidc)
* (https://moodle.org/plugins/logstore_xapi)
* (https://moodle.org/plugins/local_staticpage)

## Setup

* permissions in ./moodledata need to allow UID/GID 33  to write
* Create .env to customise docker-compose settings. Note backup uses Host's UID/GID 1000, but on mac its 501/20.

## Execution

Start Moodle:
(Whilst in the root of this project)

```docker compose up```

Dump Moodle Databse into ./sql folder:
```docker compose up moodle-db-backup```

Stop Moodle
```docker compose down```

Stop and delete volumes
```docker compose down -v```

## Access

http://localhost:8080 = Moodle
http://localhost:8081 = phpmyadmin

default moodle user: admin 
default moodle p/w: kfdalkJfdsoiew#1

## todo

1. Proceduralise upgrade process 
2. clear cache
3. Backup/Restore sql & moodledata to AWS
4. run a cron container from the same moodle volume
5. set admin password from env var via entrypoint 
6. Turn off PHP errors/warnings for prod.

