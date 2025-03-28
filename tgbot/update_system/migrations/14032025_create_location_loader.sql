CREATE TABLE IF NOT EXISTS location_loader
                    (ID BIGSERIAL PRIMARY KEY NOT NULL,
                    USER_ID BIGINT NOT NULL,
                    NAME_OF_PLACE VARCHAR(50),
                    SECTOR VARCHAR(50),
                    BUILDING VARCHAR(50),
                    FLOAR VARCHAR(50),
                    ADDRESS VARCHAR(50),
                    FOREIGN KEY (USER_ID) REFERENCES users (USER_ID));

CREATE TABLE IF NOT EXISTS location_loader_lines
                    (ID BIGSERIAL PRIMARY KEY NOT NULL,
                    LOCATION_LOADER_ID BIGINT NOT NULL,
                    LINE VARCHAR(50),
                    FOREIGN KEY (LOCATION_LOADER_ID) REFERENCES location_loader (ID));