create DATABASE bienesraices11;

USE bienesraices11;

CREATE TABLE seller(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(10)
);

drop table propierties;

CREATE TABLE propierties (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(256),
    description TEXT,
    rooms INT,
    wc INT,
    garage INT,
    timestap DATE,
    id_seller INT(11),
    CONSTRAINT fk_seller FOREIGN KEY (id_seller) REFERENCES seller(id)
);

CREATE TABLE sold_properties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_seller INT(11),
    id_prop INT(11),
    CONSTRAINT fk_seller_sold FOREIGN KEY (id_seller) REFERENCES seller(id),
    CONSTRAINT fk_prop_sold FOREIGN KEY (id_prop) REFERENCES propierties(id)
);



select * from sold_properties;

SELECT * FROM seller;

select * from propierties;

DESCRIBE propierties

insert into sold_properties(id_seller, id_prop) values(1002, 32);


INSERT INTO seller VALUES
(1001, "Foo Bar", "foo@bar.com", 1234567890),
(2002, "Bar Foo", "bar@foo.com", 0987654321);