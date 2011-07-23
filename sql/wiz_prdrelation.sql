create table wiz_prdrelation(

idx int(10) auto_increment,      -- 키
prdcode varchar(10),             -- 상품코드
relcode varchar(10),             -- 관련상품코드
PRIMARY KEY(idx),  
index(prdcode)

);