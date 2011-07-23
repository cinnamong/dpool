drop table wiz_page;

create table wiz_page(

idx int(3) auto_increment not null,
type varchar(30) not null,
subimg varchar(100),
content text,
addinfo text,
addinfo2 text,

primary key(idx)

);

insert into wiz_page values('','company','','');
insert into wiz_page values('','privacy','','');
insert into wiz_page values('','guide','','');
insert into wiz_page values('','center','','');
insert into wiz_page values('','agree','','');
insert into wiz_page values('','join','','');
insert into wiz_page values('','basket','','');
insert into wiz_page values('','community','','');
insert into wiz_page values('','prdsearch','','');