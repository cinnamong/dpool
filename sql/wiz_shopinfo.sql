drop table wiz_shopinfo;

create table wiz_shopinfo(

shop_name char(30),        	-- ������
shop_id char(20) not null, 	-- �����ھ��̵�
shop_pw char(20) not null, 	-- ��й�ȣ
shop_email char(50),       	-- �̸���
shop_hand char(14),        	-- �ڵ�����ȣ

com_num char(20),          	-- ����ڵ�Ϲ�ȣ
com_name char(30),         	-- ��ȣ
com_owner char(20),        	-- ��ǥ��
com_post char(7),          	-- ���������ȣ
com_address char(80),      	-- ������ּ�
com_kind char(50),         	-- ����
com_class char(50),        	-- ����
com_tel char(20),        		-- ��ȭ��ȣ
com_fax char(20)        		-- �ѽ���ȣ

);