create table clients
(
    clientId   int auto_increment
        primary key,
    name       varchar(255)                          null,
    address    varchar(255)                          null,
    contact    varchar(255)                          null,
    created_at timestamp default current_timestamp() not null,
    updated_at timestamp                             null
)
    charset = utf8mb4;

INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('aa', 'arsst', 'art', '2023-10-20 10:58:11', '2023-10-20 10:58:11');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('bb', 'arsst', 'art', '2023-10-20 10:59:00', '2023-10-20 10:59:00');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('ccc', 'arsst', 'art', '2023-10-20 11:00:53', '2023-10-20 11:00:53');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('ddd', 'arsst', 'art', '2023-10-20 11:02:28', '2023-10-20 11:02:28');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('fff', 'arsst', 'art', '2023-10-20 11:03:00', '2023-10-20 11:03:00');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('qqq', 'arsst', 'art', '2023-10-20 11:05:05', null);
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('www', 'arsst', 'art', '2023-10-20 11:06:03', null);
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('a', 'arsst', 'art', '2023-10-20 11:07:08', null);
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('9', 'arsst', 'art', '2023-10-20 11:07:46', null);
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('10', 'arsst', 'art', '2023-10-20 11:08:42', null);
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('11', 'arsst', 'art', '2023-10-20 11:09:12', '2023-10-20 11:09:12');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('12', 'arsst', 'art', '2023-10-20 11:10:58', '2023-10-20 11:10:58');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('13', 'arsst', 'art', '2023-10-20 11:12:12', '2023-10-20 11:12:12');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('14', 'arsst', 'art', '2023-10-20 11:12:33', '2023-10-20 11:12:33');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('15', 'arsst', 'art', '2023-10-20 11:21:40', '2023-10-20 11:21:40');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('16', 'arsst', 'art', '2023-10-20 11:22:18', '2023-10-20 11:22:18');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('ftat', 'ast', 'art', '2023-10-20 12:34:14', '2023-10-20 12:34:14');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('new', 'today', 'today', '2023-10-23 03:00:09', '2023-10-23 03:00:09');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('nooo', 'today', 'today', '2023-10-23 03:01:06', '2023-10-23 03:01:06');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('kaloy', 'yesss', '09123', '2023-10-23 04:37:19', '2023-11-17 23:11:54');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('austria', 'saan', '11111', '2023-10-23 04:37:31', '2023-10-23 04:37:31');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('Yesss', 'somewhere', '0912', '2023-10-30 17:33:51', '2023-10-30 17:33:51');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('sample', 'yes', 'ulit', '2023-11-17 23:15:13', '2023-11-17 23:15:13');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('0', '0', '0', '2023-11-17 23:44:13', '2023-11-17 23:44:13');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('23210.', '321', '321', '2023-11-17 23:49:47', '2023-11-17 23:49:47');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('00', '00', '00', '2023-11-17 23:51:57', '2023-11-17 23:51:57');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('astarst', 'asrt', 'ast', '2023-11-18 00:37:51', '2023-11-18 00:37:51');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('arst', 'at', 'arst', '2023-11-19 04:06:18', '2023-11-19 04:06:18');
INSERT INTO ptlechon.clients (name, address, contact, created_at, updated_at) VALUES ('sample today', 'arsotinearstinea', 'artat', '2023-12-11 14:30:51', '2023-12-11 14:30:51');
