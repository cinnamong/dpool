create table wiz_cprelation(

idx int(10) auto_increment not null,   -- 키
prdcode char(10),                      -- 상품코드
catcode char(6),                       -- 카테고리코드
PRIMARY KEY(idx),  
index(catcode)

);