drop table wiz_banner;

create table wiz_banner(

idx int(3) auto_increment not null,
align enum('R','L'),			-- ��ġ
prior int(3),					-- �켱����
isuse enum('Y','N'),			-- ��뿩��
link_url varchar(255),		-- ��ũ�ּ�
link_target enum('_SELF','_BLANK'),	-- ��ũŸ��
de_type enum('IMG','HTML'),-- ������Ÿ��
de_img varchar(100),			-- ����̹���
de_html text,					-- ��ʳ���

primary key(idx)

);