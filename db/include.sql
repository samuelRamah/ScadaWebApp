LOAD DATA LOCAL INFILE '/data/www/ScadaWebApp/db/message-type.csv'
INTO TABLE messageType
FIELDS
	TERMINATED BY ';'
	ENCLOSED BY ''
	ESCAPED BY '\\'
LINES
	STARTING BY ''
	TERMINATED BY '\n'
(type, value, description);

LOAD DATA LOCAL INFILE '/data/www/ScadaWebApp/db/set_req_sub-type.csv'
INTO TABLE variableType
FIELDS
	TERMINATED BY ';'
	ENCLOSED BY ''
	ESCAPED BY '\\'
LINES
	STARTING BY ''
	TERMINATED BY '\n'
(type, value, comment);

LOAD DATA LOCAL INFILE '/data/www/ScadaWebApp/db/presentation_sub-type.csv'
INTO TABLE deviceType
FIELDS
	TERMINATED BY ';'
	ENCLOSED BY ''
	ESCAPED BY '\\'
LINES
	STARTING BY ''
	TERMINATED BY '\n'
(type, value, comment);

LOAD DATA LOCAL INFILE '/data/www/ScadaWebApp/db/internal_sub-type.csv'
INTO TABLE internalType
FIELDS
	TERMINATED BY ';'
	ENCLOSED BY ''
	ESCAPED BY '\\'
LINES
	STARTING BY ''
	TERMINATED BY '\n'
(type, value, comment);