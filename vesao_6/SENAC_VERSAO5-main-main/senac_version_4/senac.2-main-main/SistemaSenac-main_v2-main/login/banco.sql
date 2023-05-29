create database caad1;
use caad1;


CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(250) NOT NULL UNIQUE,
    username VARCHAR(250) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type  VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
drop table users;
select * from users;
create table questoes(
id_ques int primary key auto_increment,
questao1 char(1),
questao2 char(1),
questao3 char(1),
questao4 char(1),
questao5 char(1),
questao6 char(1),
questao7 char(1),
questao8 char(1),
questao9 char(1),
questao10 char(1),
questao11 char(1),
questao12 char(1),
questao13 char(1),
questao14 char(1),
questao15 char(1),
questao16 char(1),
questao17 char(1),
questao18 char(1),
questao19 char(1),
questao20 char(1)
);

create table add_questoes(
id_questoes int auto_increment primary key,
numerecao int,
questao text,
nivel int
);

select * from add_questoes;

alter table questoes add column id int;
alter table questoes add constraint id foreign key(id) references users(id);




drop database test;

select * from users;
select * from questoes;

drop table questoes;



