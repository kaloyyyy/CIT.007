create table convo
(
    convoID int auto_increment
        primary key,
    userID  int not null,
    modID   int not null,
    constraint chat_chatID_uindex
        unique (convoID),
    constraint chat_mod_modID_fk
        foreign key (modID) references mods (modID),
    constraint chat_user_userID_fk
        foreign key (userID) references users (userID)
);

INSERT INTO komision.convo (convoID, userID, userID_2) VALUES (1, 1, 1);
INSERT INTO komision.convo (convoID, userID, userID_2) VALUES (2, 4, 2);
INSERT INTO komision.convo (convoID, userID, userID_2) VALUES (3, 4, 1);
INSERT INTO komision.convo (convoID, userID, userID_2) VALUES (4, 4, 3);
