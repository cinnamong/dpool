drop table wiz_order;

create table wiz_order(

orderid char(20) not null, -- �ֹ���ȣ
basketid char(32),         -- ��ٱ��� ��ȣ

send_id char(20),          -- �ֹ��� ���̵�
send_name char(20),        -- �ֹ��� �̸�
send_tphone char(14),      -- �ֹ��� ��ȭ��ȣ
send_hphone char(14),      -- �ֹ��� �ڵ���
send_email char(50),       -- �ֹ��� �̸���
send_post char(7),         -- �ֹ��� �����ȣ
send_address char(80),     -- �ֹ��� �ּ�
demand text,               -- ��û����
message text,              -- ���� �޼���
  
rece_name char(20),        -- ������ �̸�
rece_tphone char(14),      -- ������ ��ȭ��ȣ
rece_hphone char(14),      -- ������ �ڵ���
rece_post char(7),         -- ������ �����ȣ
rece_address char(80),     -- ������ �ּ�
  
pay_method enum('PB','PC','PH','PI'),    -- �������
account_name char(20),     -- �Ա��ڸ�
account char(80),          -- �Աݰ���
  
reserve_use int(10),       -- ������ ����
reserve_price int(10),     -- ������
deliver_price int(10),     -- ��ۺ�
deliver_num char(32),      -- ������ȣ
prd_price int(10),    		-- ��ǰ�ݾ�
total_price int(10),    	-- �� �����ݾ�

status enum('OR','OY','SR', 'SM', 'SY', 'CY'),  -- ó������( OR:�ֹ�����, OY:�Ա�Ȯ�� , SR:���ó����, SM:�����, SY:��ۿϷ�, CY:�ֹ���� )
  
order_date datetime,        -- �ֹ�����
pay_date datetime,			 -- �Ա�Ȯ������
send_date datetime,         -- �������
cancel_date datetime,       -- �������
descript text,              -- �����ڸ޸�

primary key(orderid),
index(pay_method,send_id,status)  

);