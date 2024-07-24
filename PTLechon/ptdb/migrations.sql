create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
);

INSERT INTO ptlechon.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 1);
INSERT INTO ptlechon.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO ptlechon.migrations (migration, batch) VALUES ('2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO ptlechon.migrations (migration, batch) VALUES ('2019_12_14_000001_create_personal_access_tokens_table', 1);
