create table comm
(
    commID     int auto_increment
        primary key,
    price      int                                  not null,
    chatID     int                                  not null,
    created_at datetime default current_timestamp() not null,
    constraint comm_chatID_uindex
        unique (chatID),
    constraint comm_commID_uindex
        unique (commID),
    constraint comm_chat_chatID_fk
        foreign key (chatID) references chat (chatID)
);

INSERT INTO komision.comm (commID, price, chatID, created_at) VALUES (1, 250, 9, '2022-05-19 15:55:03');
