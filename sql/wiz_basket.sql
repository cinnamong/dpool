drop table wiz_basket;

create table wiz_basket(

idx int(10) auto_increment not null,
basketid char(32),         -- ��ٱ��Ϲ�ȣ
prdcode char(10),          -- ��ǰ�ѹ�
prdname char(100),			-- ��ǰ��
prdimg char(30),				-- ��ǰ�̹���
prdprice int(10),          -- ��ǰ����
prdreserve int(10),			-- ��ǰ������

opttitle char(50),         -- �ɼ�Ÿ��Ʋ1
optcode char(50),          -- �ɼǼӼ�1
opttitle2 char(50),        -- �ɼ�Ÿ��Ʋ2
optcode2 char(50),         -- �ɼǼӼ�2
opttitle3 char(50),        -- �ɼ�Ÿ��Ʋ3
optcode3 char(50),         -- �ɼǼӼ�3

amount int(5),             -- ���ż�
wdate datetime,            -- ����
status char(2),   			-- �ֹ����� ����
primary key(idx),
index (basketid)

);