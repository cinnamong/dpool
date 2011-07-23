create table wiz_tradecom(

idx int(10) auto_increment,            -- 키

com_type enum('BUY','SAL','DEL','OTH'),-- 업체구분(매입처,매출처,배송업체,기타)
com_num varchar(20),                   -- 사업자등록번호
com_name varchar(30),                  -- 상호
com_owner varchar(20),                 -- 대표자
com_post varchar(7),                   -- 사업장우편번호
com_address varchar(80),               -- 사업장주소
com_kind varchar(50),                  -- 업태
com_class varchar(50),                 -- 종목
com_tel varchar(14),                   -- 전화번호
com_fax varchar(14),                   -- 팩스
com_bank varchar(20),                  -- 거래은행
com_account varchar(25),               -- 계좌번호
com_homepage varchar(50),              -- 홈페이지
  
charge_name varchar(20),               -- 담당자 이름
charge_email varchar(50),              -- 담당자 이메일
charge_hand varchar(14),               -- 담당자 휴대폰
charge_tel varchar(14),                -- 담당자 전화번호
descript text,                         -- 기타사항

primary key(idx)

);