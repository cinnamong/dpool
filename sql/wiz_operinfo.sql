drop table wiz_operinfo;

create table wiz_operinfo(

pay_method char(20),				-- �������
pay_id char(30),					-- �����ý��۾��̵�
pay_account text,						-- ������¹�ȣ

del_method enum('DA','DB','DC','DD'),	-- ��۹��
del_fixprice int(10),				-- ��ۺ� ������
del_staprice int(10),				-- ���Ű��ݺ�
del_staprice2 int(10),				-- �����̻󱸸Ž�
del_staprice3 int(10),				-- �������ϱ��Ž�

del_extrapost1 int(10),				-- ���������ȣ
del_extrapost12 int(10),			-- ���������ȣ2
del_extraprice1 int(10),			-- ������

del_extrapost2 int(10),
del_extrapost22 int(10),
del_extraprice2 int(10),

del_extrapost3 int(10),
del_extrapost32 int(10),
del_extraprice3 int(10),

reserve_use enum('Y','N'),			-- �����ݻ�뿩��
reserve_join int(10),				-- ȸ������ ������
reserve_recom int(10),				-- ��õ�� ������
reserve_min int(10),					-- �ּһ�� ������
reserve_max int(10),					-- 1ȸ �ִ��� ������
reserve_buy int(10),					-- ��ǰ���Ž� ������
reserve_per int(10),					-- ������ �ϰ�����

review_use enum('Y','N'),			-- ��ǰ���뿩��
review_level enum('E','M'),		-- ��ǰ�������

con_parameter char(255)			-- Ű����м��� ����ϴ� �ĸ����͸�

);