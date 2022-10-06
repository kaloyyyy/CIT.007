create table users
(
    userID     int auto_increment
        primary key,
    username   varchar(50)                          not null,
    password   varchar(255)                         not null,
    created_at datetime default current_timestamp() not null,
    constraint user_userID_uindex
        unique (userID),
    constraint user_userName_uindex
        unique (username)
)
    auto_increment = 6;

INSERT INTO komision.users (userID, username, password, created_at) VALUES (1, 'kalz16', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-04-24 12:11:14');
INSERT INTO komision.users (userID, username, password, created_at) VALUES (2, 'zlak16', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-05-02 15:46:04');
INSERT INTO komision.users (userID, username, password, created_at) VALUES (3, 'user3', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-05-03 07:05:08');
INSERT INTO komision.users (userID, username, password, created_at) VALUES (4, 'user', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-05-19 15:49:00');
