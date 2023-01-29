create table tasks
(
    id          int auto_increment,
    name        varchar(255)              not null,
    email       varchar(255)              not null,
    description text                      not null,
    status      enum ('new', 'done')      not null,
    primary key (id)
);