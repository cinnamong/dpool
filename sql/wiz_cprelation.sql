create table wiz_cprelation(

idx int(10) auto_increment not null,   -- Ű
prdcode char(10),                      -- ��ǰ�ڵ�
catcode char(6),                       -- ī�װ��ڵ�
PRIMARY KEY(idx),  
index(catcode)

);