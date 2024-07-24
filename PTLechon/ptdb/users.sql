create table users
(
    id                bigint unsigned auto_increment
        primary key,
    username          varchar(255) not null,
    name              varchar(255) not null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
);

create index users_username_unique
    on users (username);

INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('Kalz16', 'Kaloy', 'kaloyau16@gmail.com', null, '$2y$10$XjpbhSC4iYSXjACwG1Jyke/ZYpUj/oivUvrgaRoO9v8UX3QPDUOtm', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('testpatient', 'testpatient', 'testpatient@gmail.com', null, '$2y$10$Gai3OHgmvbjWvLyWz/sBCeNwTQkFp9qTsIHZnCWiW8LRJyHrrtnmK', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('123456', '123456', '123456@gmail.com', null, '$2y$10$Gai3OHgmvbjWvLyWz/sBCeNwTQkFp9qTsIHZnCWiW8LRJyHrrtnmK
', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('doctor', 'doctor', 'doctor@gmail.com', null, '$2y$10$Gai3OHgmvbjWvLyWz/sBCeNwTQkFp9qTsIHZnCWiW8LRJyHrrtnmK', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('patient', 'patient', 'patient@gmail.com', null, '$2y$10$Gai3OHgmvbjWvLyWz/sBCeNwTQkFp9qTsIHZnCWiW8LRJyHrrtnmK', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('doc', 'doc', 'doc@gmail.com', null, '12345', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('test', 'test', 'test@gmail.com', '2023-09-21 15:17:03', '12345', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('super', 'super', 'super@gmail.com', null, '12345', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('Eilon', 'Eilon', 'Eilon@gmail.com', null, '12345', null, null, null);
INSERT INTO ptlechon.users (username, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('aleek', 'aleek', 'aleek@gmail.com', null, '12345', null, null, null);
