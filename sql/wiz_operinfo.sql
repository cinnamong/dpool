drop table wiz_operinfo;

create table wiz_operinfo(

pay_method char(20),				-- 결제방법
pay_id char(30),					-- 결제시스템아이디
pay_account text,						-- 은행계좌번호

del_method enum('DA','DB','DC','DD'),	-- 배송방법
del_fixprice int(10),				-- 배송비 고정값
del_staprice int(10),				-- 구매가격별
del_staprice2 int(10),				-- 가격이상구매시
del_staprice3 int(10),				-- 가격이하구매시

del_extrapost1 int(10),				-- 할증우편번호
del_extrapost12 int(10),			-- 할증우편번호2
del_extraprice1 int(10),			-- 할증료

del_extrapost2 int(10),
del_extrapost22 int(10),
del_extraprice2 int(10),

del_extrapost3 int(10),
del_extrapost32 int(10),
del_extraprice3 int(10),

reserve_use enum('Y','N'),			-- 적립금사용여부
reserve_join int(10),				-- 회원가입 적립금
reserve_recom int(10),				-- 추천인 적립금
reserve_min int(10),					-- 최소사용 적립금
reserve_max int(10),					-- 1회 최대사용 적립금
reserve_buy int(10),					-- 상품구매시 적립금
reserve_per int(10),					-- 적립금 일괄적용

review_use enum('Y','N'),			-- 상품평사용여부
review_level enum('E','M'),		-- 상품평사용권한

con_parameter char(255)			-- 키워드분석에 사용하는 파마메터명

);