--drop table wiz_bbsinfo;

create table wiz_bbsinfo(

code char(30),				-- �Խ����ڵ�
title char(50),			-- Ÿ��Ʋ
titleimg char(40),		-- Ÿ��Ʋ�̹���

lpermi char(2),			-- ��ϱ���
rpermi char(2),			-- �б����
wpermi char(2),			-- �������

skin char(20),				-- ��ŲŸ��
usetype enum('Y','N'),	-- ��뿩��
upfile enum('Y','N'),	-- ���Ͼ��ε����
comment enum('Y','N'),	-- �������
remail enum('Y','N'),	-- ��۸��Ͼ˸�
imgview enum('Y','N'),	-- ÷���̹��� ����
abuse text,					-- �����͸�

rows int(3),				-- ��������¼�
lists int(3),				-- ����Ʈ��¼�
new int(3),					-- new�Ⱓ����
hot int(3),					-- hot��ȸ������

unique(code)

);