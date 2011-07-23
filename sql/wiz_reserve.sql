drop table wiz_reserve;

create table wiz_reserve(

idx int(10) auto_increment not null,   -- 키
memid char(20) not null,               -- 회원아이디
reservemsg char(100) not null,         -- 적립금내역
reserve int(10) not null,              -- 적립금
orderid char(20),                      -- 주문번호
wdate datetime,                        -- 등록일
primary key(idx),  
index(memid)  

);