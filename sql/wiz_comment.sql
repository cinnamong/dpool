drop table wiz_comment;

create table wiz_comment(

idx int(10) auto_increment not null,	-- Ű

bbsidx char(20),		-- �Խù��ѹ�
prdcode char(10),    -- ��ǰ�ѹ�
star int(1),			-- ��ȣ��
id char(20),			-- ���̵�
name char(20),			-- �ۼ���
content text,			-- �ۼ�����
passwd char(20),		-- ��й�ȣ
wdate datetime,		-- �ۼ���
wip char(20),			-- ����ip

primary key(idx)

);