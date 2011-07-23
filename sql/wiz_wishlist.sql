drop table wiz_wishlist;

create table wiz_wishlist(

idx int(10) auto_increment not null,   -- 키
memid char(20),                        -- 회원아이디
prdcode char(10),                      -- 상품아이디
wdate date,                            -- 등록일
primary key(idx),
index(memid)

);
