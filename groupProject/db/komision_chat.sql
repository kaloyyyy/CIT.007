create table chat
(
    chatID     int auto_increment
        primary key,
    created_at datetime default current_timestamp() not null,
    sender     smallint(1)                          not null,
    message    longtext                             null,
    convID     int                                  not null,
    constraint chat_convo_convoID_fk
        foreign key (convID) references convo (convoID)
);

INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (1, '2022-05-19 15:52:29', 0, 'hi', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (2, '2022-05-19 15:52:58', 0, 'I would like to avail this certain commission', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (3, '2022-05-19 15:53:08', 1, 'hello kalz16', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (4, '2022-05-19 15:53:13', 1, 'I would be glad to serve you', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (5, '2022-05-19 15:53:35', 0, 'I would like to avail this and that', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (6, '2022-05-19 15:53:39', 0, 'for 250 PHP', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (7, '2022-05-19 15:54:23', 0, 'thanks', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (8, '2022-05-19 15:54:26', 1, 'okay', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (9, '2022-05-19 15:55:03', 1, 'this and that yada yada yada etc etc blah ', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (10, '2022-05-19 15:55:14', 1, 'you can see it in your tab now', 1);
INSERT INTO komision.chat (chatID, created_at, sender, message, convID) VALUES (11, '2022-05-19 15:56:37', 0, 'Hi', 3);
