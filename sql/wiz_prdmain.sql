drop table wiz_prdmain;

create table wiz_prdmain(

idx int(3) auto_increment not null,
type varchar(30) not null,
typename varchar(30),	-- 타입이름
isuse enum('Y','N'),		-- 사용여부
prior int(3),				-- 우선순위
skin_type char(10),		-- 스킨타입
prd_num int(3),			-- 상품갯수
prd_width int(3),			-- 상품 너비
prd_height int(3),		-- 상품 높이
barimg varchar(255),		-- 바이미지
html text,					-- html

primary key(idx)

);

insert into wiz_prdmain values('','new','신상품','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','recom','추천상품','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','popular','인기상품','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','sale','세일상품','Y','1','','20','130','130','','');