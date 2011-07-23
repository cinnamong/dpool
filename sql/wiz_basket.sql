drop table wiz_basket;

create table wiz_basket(

idx int(10) auto_increment not null,
basketid char(32),         -- 장바구니번호
prdcode char(10),          -- 상품넘버
prdname char(100),			-- 상품명
prdimg char(30),				-- 상품이미지
prdprice int(10),          -- 상품가격
prdreserve int(10),			-- 상품적립금

opttitle char(50),         -- 옵션타이틀1
optcode char(50),          -- 옵션속성1
opttitle2 char(50),        -- 옵션타이틀2
optcode2 char(50),         -- 옵션속성2
opttitle3 char(50),        -- 옵션타이틀3
optcode3 char(50),         -- 옵션속성3

amount int(5),             -- 구매수
wdate datetime,            -- 일자
status char(2),   			-- 주문상태 구분
primary key(idx),
index (basketid)

);