drop table wiz_category;

create table wiz_category(

catcode char(6) not null,           -- ī�װ��ѹ�
depthno int(1),                     -- �з� ����
priorno01 int(2),                   -- ��з� �켱����
priorno02 int(2),                   -- �ߺз� �켱����
priorno03 int(2),                   -- �Һз� �켱����

catname char(30),                   -- ī�װ��̸�
catuse enum('Y','N'),               -- ī�װ����뿩��
catimg text,              				-- ī�װ� �̹���
catimg_type char(3),						-- �̹���Ÿ��

prd_tema char(10),                  -- ��ǰ�����׸� tema01 tema02
prd_num int(3),                     -- ��ǰ������
prd_width int(3),							-- ��ǰ����ũ��
prd_height int(3),						-- ��ǰ����ũ��

recom_tema char(10),                -- ��õ��ǰ�����׸� tema01, tema02
recom_num int(3),                   -- ��õ��ǰ������

primary key(catcode)

);