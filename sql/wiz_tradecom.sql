create table wiz_tradecom(

idx int(10) auto_increment,            -- Ű

com_type enum('BUY','SAL','DEL','OTH'),-- ��ü����(����ó,����ó,��۾�ü,��Ÿ)
com_num varchar(20),                   -- ����ڵ�Ϲ�ȣ
com_name varchar(30),                  -- ��ȣ
com_owner varchar(20),                 -- ��ǥ��
com_post varchar(7),                   -- ���������ȣ
com_address varchar(80),               -- ������ּ�
com_kind varchar(50),                  -- ����
com_class varchar(50),                 -- ����
com_tel varchar(14),                   -- ��ȭ��ȣ
com_fax varchar(14),                   -- �ѽ�
com_bank varchar(20),                  -- �ŷ�����
com_account varchar(25),               -- ���¹�ȣ
com_homepage varchar(50),              -- Ȩ������
  
charge_name varchar(20),               -- ����� �̸�
charge_email varchar(50),              -- ����� �̸���
charge_hand varchar(14),               -- ����� �޴���
charge_tel varchar(14),                -- ����� ��ȭ��ȣ
descript text,                         -- ��Ÿ����

primary key(idx)

);