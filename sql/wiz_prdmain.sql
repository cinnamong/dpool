drop table wiz_prdmain;

create table wiz_prdmain(

idx int(3) auto_increment not null,
type varchar(30) not null,
typename varchar(30),	-- Ÿ���̸�
isuse enum('Y','N'),		-- ��뿩��
prior int(3),				-- �켱����
skin_type char(10),		-- ��ŲŸ��
prd_num int(3),			-- ��ǰ����
prd_width int(3),			-- ��ǰ �ʺ�
prd_height int(3),		-- ��ǰ ����
barimg varchar(255),		-- ���̹���
html text,					-- html

primary key(idx)

);

insert into wiz_prdmain values('','new','�Ż�ǰ','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','recom','��õ��ǰ','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','popular','�α��ǰ','Y','1','','20','130','130','','');
insert into wiz_prdmain values('','sale','���ϻ�ǰ','Y','1','','20','130','130','','');