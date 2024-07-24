create table orders
(
    orderId          int auto_increment
        primary key,
    clientId         int          null,
    amountPaid       int          not null,
    balance          int          not null,
    deliveryFee      int          not null,
    deliveryDatetime varchar(255) not null,
    lechonPrice      int          null,
    created_at       timestamp    null,
    updated_at       timestamp    null,
    constraint orders_clients_clientId_fk
        foreign key (clientId) references clients (clientId)
)
    charset = utf8mb4;

INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (88, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (89, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (92, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (92, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (95, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (96, 12, 11988, 12, '2023-10-20T10:37', null, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (98, 12, 11988, 12, '2023-10-20T10:37', 1020, null, null);
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (98, 12, 11988, 12, '2023-10-20T10:37', 1020, '2023-10-20 11:10:51', '2023-10-20 11:10:51');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (101, 12, 11988, 12, '2023-10-20T10:37', 1020, '2023-10-20 11:12:33', '2023-10-20 11:12:33');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (103, 12, 11988, 12, '2023-10-20T10:37', 1020, '2023-10-20 11:22:18', '2023-10-20 11:22:18');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (103, 12, 11988, 12, '2023-10-20T10:37', 1020, '2023-10-20 11:48:13', '2023-10-20 11:48:13');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (104, 12, 10488, 3, '2023-10-28T16:34', 1020, '2023-10-20 12:34:14', '2023-10-20 12:34:14');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (105, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:00:09', '2023-10-23 03:00:09');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:01:06', '2023-10-23 03:01:06');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:01:26', '2023-10-23 03:01:26');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:03:06', '2023-10-23 03:03:06');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:03:12', '2023-10-23 03:03:12');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:03:21', '2023-10-23 03:03:21');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:03:57', '2023-10-23 03:03:57');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:04:32', '2023-10-23 03:04:32');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:04:48', '2023-10-23 03:04:48');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:05:24', '2023-10-23 03:05:24');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (106, 0, 16100, 0, '2023-10-23T03:00', 1020, '2023-10-23 03:07:24', '2023-10-23 03:07:24');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (107, 10, 20090, 1, '2023-10-23T04:37', 1020, '2023-10-23 04:37:19', '2023-10-23 04:37:19');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (108, 10, 20090, 1, '2023-10-23T04:37', 1020, '2023-10-23 04:37:31', '2023-10-23 04:37:31');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (108, 10, 20090, 1, '2023-10-23T04:37', 1020, '2023-10-23 04:49:26', '2023-10-23 04:49:26');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (107, 10, 20090, 1, '2023-10-23T04:37', 1020, '2023-10-23 04:49:33', '2023-10-23 04:49:33');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (109, 10, 52901, 0, '2023-10-30T17:33', 1020, '2023-10-30 17:33:51', '2023-10-30 17:33:51');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (107, 0, 4800, 0, '2023-11-17T23:11', 1020, '2023-11-17 23:11:54', '2023-11-17 23:11:54');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (110, 0, 0, 0, '2023-11-17T23:15', 1020, '2023-11-17 23:15:13', '2023-11-17 23:15:13');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (111, 0, 0, 0, '2023-11-17T23:44', 1020, '2023-11-17 23:44:13', '2023-11-17 23:44:13');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (110, 0, 0, 0, '2023-11-17T23:15', 1020, '2023-11-17 23:44:40', '2023-11-17 23:44:40');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (112, 0, 2000, 0, '2023-11-17T23:49', 1020, '2023-11-17 23:49:47', '2023-11-17 23:49:47');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (113, 0, 1000, 0, '2023-11-17T23:51', 1020, '2023-11-18 00:34:02', '2023-11-18 00:34:02');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (113, 0, 1000, 0, '2023-11-17T23:51', 1020, '2023-11-18 00:34:33', '2023-11-18 00:34:33');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (113, 0, 1000, 0, '2023-11-17T23:51', 1020, '2023-11-18 00:34:57', '2023-11-18 00:34:57');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (113, 0, 1000, 0, '2023-11-17T23:51', 1020, '2023-11-18 00:36:21', '2023-11-18 00:36:21');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (110, 0, 0, 0, '2023-11-17T23:15', 1020, '2023-11-18 00:37:07', '2023-11-18 00:37:07');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (114, 0, 0, 0, '2023-11-18T00:37', 1020, '2023-11-18 00:37:51', '2023-11-18 00:37:51');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (114, 0, 0, 0, '2023-11-18T00:37', 1000, '2023-11-18 00:38:43', '2023-11-18 00:38:43');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (114, 100, 900, 0, '2023-11-18T00:37', 1000, '2023-11-18 00:43:23', '2023-11-18 00:43:23');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (114, 100, 900, 0, '2023-11-18T00:37', 1000, '2023-11-18 00:43:43', '2023-11-18 00:43:43');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (115, 1, 4299, 1, '2023-11-19T04:06', 0, '2023-11-19 04:06:18', '2023-11-19 04:06:18');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (116, 1000, 14700, 0, '2023-12-11T15:30', 0, '2023-12-11 14:30:51', '2023-12-11 14:30:51');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (116, 1000, 14700, 0, '2023-12-11T12:30', 0, '2023-12-11 14:31:01', '2023-12-11 14:31:01');
INSERT INTO ptlechon.orders (clientId, amountPaid, balance, deliveryFee, deliveryDatetime, lechonPrice, created_at, updated_at) VALUES (116, 1000, 14700, 0, '2023-12-11T22:30', 0, '2023-12-11 14:31:10', '2023-12-11 14:31:10');
