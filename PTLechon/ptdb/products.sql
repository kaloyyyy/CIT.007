create table products
(
    productId   int auto_increment
        primary key,
    price       int                  not null,
    description varchar(255)         null,
    isAddon     tinyint(1) default 0 null
)
    charset = utf8mb4;

INSERT INTO ptlechon.products (price, description, isAddon) VALUES (7500, 'Set 1', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (7500, 'Set 2', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (7500, 'Set 3', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (7500, 'Set 4', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (3800, 'Package A', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (4300, 'Package B', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (4800, 'Package C', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (0, 'Lechon', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (2300, 'Belly 4 Kg', 0);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (400, 'Dinuguan', 1);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (700, 'Dinuguan with Meat', 1);
INSERT INTO ptlechon.products (price, description, isAddon) VALUES (400, 'Paklay', 1);
