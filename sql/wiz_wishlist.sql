drop table wiz_wishlist;

create table wiz_wishlist(

idx int(10) auto_increment not null,   -- Ű
memid char(20),                        -- ȸ�����̵�
prdcode char(10),                      -- ��ǰ���̵�
wdate date,                            -- �����
primary key(idx),
index(memid)

);
