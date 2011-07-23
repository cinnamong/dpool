drop table wiz_order;

create table wiz_order(

orderid char(20) not null, -- 주문번호
basketid char(32),         -- 장바구니 번호

send_id char(20),          -- 주문자 아이디
send_name char(20),        -- 주문자 이름
send_tphone char(14),      -- 주문자 전화번호
send_hphone char(14),      -- 주문자 핸드폰
send_email char(50),       -- 주문자 이메일
send_post char(7),         -- 주문자 우편번호
send_address char(80),     -- 주문자 주소
demand text,               -- 요청사항
message text,              -- 전달 메세지
  
rece_name char(20),        -- 수취인 이름
rece_tphone char(14),      -- 수취인 전화번호
rece_hphone char(14),      -- 수취인 핸드폰
rece_post char(7),         -- 수취인 우편번호
rece_address char(80),     -- 수취인 주소
  
pay_method enum('PB','PC','PH','PI'),    -- 결제방법
account_name char(20),     -- 입금자명
account char(80),          -- 입금계좌
  
reserve_use int(10),       -- 적립금 사용액
reserve_price int(10),     -- 적립금
deliver_price int(10),     -- 배송비
deliver_num char(32),      -- 운송장번호
prd_price int(10),    		-- 상품금액
total_price int(10),    	-- 총 결제금액

status enum('OR','OY','SR', 'SM', 'SY', 'CY'),  -- 처리상태( OR:주문접수, OY:입금확인 , SR:배송처리중, SM:배송중, SY:배송완료, CY:주문취소 )
  
order_date datetime,        -- 주문일자
pay_date datetime,			 -- 입금확인일자
send_date datetime,         -- 배송일자
cancel_date datetime,       -- 취소일자
descript text,              -- 관리자메모

primary key(orderid),
index(pay_method,send_id,status)  

);