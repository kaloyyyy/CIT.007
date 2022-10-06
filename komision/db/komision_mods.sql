create table mods
(
    modID      int auto_increment
        primary key,
    username   varchar(50)                          not null,
    password   varchar(255)                         not null,
    created_at datetime default current_timestamp() not null,
    constraint mod_modID_uindex
        unique (modID),
    constraint mod_modUsername_uindex
        unique (username)
)
    auto_increment = 4;

INSERT INTO komision.mods (modID, username, password, created_at) VALUES (1, 'mod-hak_16', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-04-24 12:11:14');
INSERT INTO komision.mods (modID, username, password, created_at) VALUES (2, 'mod-luna', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-05-03 04:56:01');
INSERT INTO komision.mods (modID, username, password, created_at) VALUES (3, 'mod-wokes', '$2y$10$.j52BZKzNkq7skpGdH4ipOFCPVEEJVA3uMIsDfb1OJ0M88EuAnstO', '2022-05-03 08:18:33');
