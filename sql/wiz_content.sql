drop table wiz_content;

create table wiz_content(

idx int(3) auto_increment not null,
type varchar(30) not null,
isuse enum('Y','N'),		-- 사용여부
scroll enum('Y','N'),	-- 스크롤여부
posi_x int(3),				-- 위치x
posi_y int(3),				-- 위치y
size_x int(3),				-- 사이즈x
size_y int(3),				-- 사이즈y
sdate date,					-- 게시시작일
edate date,					-- 게시마감일
linkurl varchar(255),	-- 링크주소
title varchar(255),		-- 제목
content text,				-- 내용
wdate date,					-- 등록일

primary key(idx)

);

insert into wiz_content values('','company','Y','','','','','','','','','','',now());
insert into wiz_content values('','agreement','Y','','','','','','','','','','',now());
insert into wiz_content values('','guide','Y','','','','','','','','','','',now());
insert into wiz_content values('','privacy','Y','','','','','','','','','','',now());
insert into wiz_content values('','new','Y','','','','','','','','','','',now());