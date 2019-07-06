CREATE TABLE user
(
    id    INT AUTO_INCREMENT,
    name  VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    login VARCHAR(255) NOT NULL,
    pass  VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE expense
(
    id        INT AUTO_INCREMENT,
    user_id   INT            NOT NULL,
    name      VARCHAR(255)   NOT NULL,
    amount    DECIMAL(10, 2) NOT NULL,
    date      DATE,
    repeating BOOLEAN,
    planned   BOOLEAN,
    income    BOOLEAN,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user (id)
);