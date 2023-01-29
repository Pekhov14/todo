create table users
(
    id       int auto_increment,
    name     varchar(255) not null,
    password varchar(255) not null,
    constraint users_pk
        primary key (id)
);