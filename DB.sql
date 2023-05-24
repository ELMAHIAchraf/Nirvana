CREATE DATABASE log;
CREATE TABLE clients(
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    Fname VARCHAR(30),
    Lname VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password_client VARCHAR(255),
    adresse varchar(100)
);
CREATE TABLE token(
    token varchar(255) PRIMARY KEY,
    creation_date date,
    expiration_date date,
    id_client INT,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);
CREATE TABLE Precovery(
    token varchar(255) PRIMARY KEY,
    email varchar(50),
    token_creation_time DATETIME,
    id_client INT,
    FOREIGN KEY (id_client) REFERENCES client(id_client)
);
CREATE TABLE articles(
    id_article INT AUTO_INCREMENT PRIMARY KEY,
    name_article varchar(50),
    description_article text,
    category varchar(30),
    price float,
    color1 INT,
    color2 INT,
    color3 INT,
    FOREIGN KEY (color1) REFERENCES colors(id_color),
    FOREIGN KEY (color2) REFERENCES colors(id_color),
    FOREIGN KEY (color3) REFERENCES colors(id_color)
);
CREATE TABLE colors(
    id_color INT AUTO_INCREMENT PRIMARY KEY,
    color varchar(50)
);
CREATE TABLE orders(
    id_order INT AUTO_INCREMENT,
    id_client INT,
    id_article INT,
    date_commande date,
    date_livraison date,
    color varchar(10),
    quantity int,
    size varchar(5),
    brief_review varchar(50),
    review text,
    rating float,
    PRIMARY KEY(id_order, id_client, id_article),
    FOREIGN KEY (id_client) REFERENCES client(id_client),
    FOREIGN KEY (id_article) REFERENCES articles(id_article)
);
CREATE TABLE cart(
    id_client INT,
    id_article INT,
    id_cart INT AUTO_INCREMENT
    color CARCHAR(30),
    quantity INT,
    id_color VARCHAR(10),
    PRIMARY KEY(id_client, id_article, id_cart),
    FOREIGN KEY (id_client) REFERENCES client(id_client),
    FOREIGN KEY (id_article) REFERENCES articles(id_article)
);
-- Inserting orders
-- INSERT INTO orders VALUES('', 14, 1, '2023-02-15', '2023-02-20', '#5588B7', 1, '','Decent!', 'Not great but also not bad', 3);
-- INSERT INTO orders VALUES('', 12, 1, '2023-02-15', '2023-02-20', '#5588B7', 1, '','pleased', 'Worth buying. I recommand it', 4);



