drop table wiz_reserve;

create table wiz_reserve(

idx int(10) auto_increment not null,   -- Ű
memid char(20) not null,               -- ȸ�����̵�
reservemsg char(100) not null,         -- �����ݳ���
reserve int(10) not null,              -- ������
orderid char(20),                      -- �ֹ���ȣ
wdate datetime,                        -- �����
primary key(idx),  
index(memid)  

);