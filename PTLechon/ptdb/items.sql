create table items
(
    itemId    int auto_increment
        primary key,
    productId int null,
    orderId   int null,
    quantity  int null,
    price     int null comment 'not null when lechon is selected',
    constraint items_orders_orderId_fk
        foreign key (orderId) references orders (orderId),
    constraint items_products_productId_fk
        foreign key (productId) references products (productId)
);

create index items_itemId_index
    on items (itemId);

INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (10, 88, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 88, 1, 700);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (12, 88, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (1, 89, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (3, 89, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (4, 89, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (5, 89, 1, 3800);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (6, 89, 1, 4300);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (7, 89, 1, 4800);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 89, 1, 0);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (9, 89, 1, 2300);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (10, 89, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 89, 1, 700);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (12, 89, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (1, 90, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (2, 90, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (3, 90, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (4, 90, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (5, 90, 2, 3800);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (7, 90, 1, 4800);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 90, 1, 111);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (9, 90, 2, 2300);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (10, 90, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 90, 1, 700);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (12, 90, 1, 400);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (7, 91, 1, 4800);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 91, 1, 0);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 92, 1, 2000);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 94, 1, 2000);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 95, 1, 2000);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 99, 1, 1000);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (8, 104, 1, 1000);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (6, 105, 1, 4300);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (1, 106, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (3, 106, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 106, 1, 700);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (1, 107, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (3, 107, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 107, 1, 700);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (1, 108, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (3, 108, 1, 7500);
INSERT INTO ptlechon.items (productId, orderId, quantity, price) VALUES (11, 108, 1, 700);
