# Privileges for `alessandro.ravoiu`@`localhost`


GRANT SELECT, INSERT, UPDATE, DELETE ON `giornalino`.* TO `alessandro.ravoiu`@`localhost`;


# Privileges for `ciprian.corobca`@`localhost`


GRANT SELECT, INSERT, UPDATE, DELETE ON `giornalino`.* TO `ciprian.corobca`@`localhost`;


# Privileges for `guest`@`localhost`


GRANT SELECT ON `giornalino`.* TO `guest`@`localhost`;


# Privileges for `imran.zafar`@`localhost`


GRANT SELECT, INSERT, UPDATE, DELETE ON `giornalino`.* TO `imran.zafar`@`localhost`;


# Privileges for `michele.molent`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE ON `giornalino`.* TO `michele.molent`@`localhost`;


# Privileges for `root`@`127.0.0.1`

GRANT ALL PRIVILEGES ON *.* TO `root`@`127.0.0.1` WITH GRANT OPTION;


# Privileges for `root`@`::1`

GRANT ALL PRIVILEGES ON *.* TO `root`@`::1` WITH GRANT OPTION;


# Privileges for `root`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO `root`@`localhost` WITH GRANT OPTION;

GRANT PROXY ON ''@'%' TO 'root'@'localhost' WITH GRANT OPTION;