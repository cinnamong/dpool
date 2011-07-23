drop table wiz_content;

create table wiz_content(

idx int(3) auto_increment not null,
type varchar(30) not null,
isuse enum('Y','N'),		-- ��뿩��
scroll enum('Y','N'),	-- ��ũ�ѿ���
posi_x int(3),				-- ��ġx
posi_y int(3),				-- ��ġy
size_x int(3),				-- ������x
size_y int(3),				-- ������y
sdate date,					-- �Խý�����
edate date,					-- �Խø�����
linkurl varchar(255),	-- ��ũ�ּ�
title varchar(255),		-- ����
content text,				-- ����
wdate date,					-- �����

primary key(idx)

);

insert into wiz_content values('','company','Y','','','','','','','','','','',now());
insert into wiz_content values('','agreement','Y','','','','','','','','','','',now());
insert into wiz_content values('','guide','Y','','','','','','','','','','',now());
insert into wiz_content values('','privacy','Y','','','','','','','','','','',now());
insert into wiz_content values('','new','Y','','','','','','','','','','',now());