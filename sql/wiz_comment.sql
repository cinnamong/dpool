drop table wiz_comment;

create table wiz_comment(

idx int(10) auto_increment not null,	-- 키

bbsidx char(20),		-- 게시물넘버
prdcode char(10),    -- 상품넘버
star int(1),			-- 선호도
id char(20),			-- 아이디
name char(20),			-- 작성자
content text,			-- 작성내용
passwd char(20),		-- 비밀번호
wdate datetime,		-- 작성일
wip char(20),			-- 적성ip

primary key(idx)

);