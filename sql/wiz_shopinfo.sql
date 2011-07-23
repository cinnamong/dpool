drop table wiz_shopinfo;

create table wiz_shopinfo(

shop_name char(30),        	-- 상점명
shop_id char(20) not null, 	-- 관리자아이디
shop_pw char(20) not null, 	-- 비밀번호
shop_email char(50),       	-- 이메일
shop_hand char(14),        	-- 핸드폰번호

com_num char(20),          	-- 사업자등록번호
com_name char(30),         	-- 상호
com_owner char(20),        	-- 대표자
com_post char(7),          	-- 사업장우편번호
com_address char(80),      	-- 사업장주소
com_kind char(50),         	-- 업태
com_class char(50),        	-- 종목
com_tel char(20),        		-- 전화번호
com_fax char(20)        		-- 팩스번호

);