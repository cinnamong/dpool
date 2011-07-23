drop table wiz_bbs;

create table wiz_bbs(

idx int(10) not null auto_increment,                  -- �ش�Խ��� Ű
code char(30),                -- �Խ����ڵ�
prino int(10),                -- �Խù�����Ű
subno int(5),                 -- �亯����Ű
depno int(2),                 -- �亯����
notice char(1),               -- �����ۼ���(Y)

memid char(20),					-- �ۼ��� ���̵�
name char(20),                -- �ۼ��� �̸�
email char(50),               -- �ۼ����̸���
subject char(100),            -- ����
content text,                 -- ����
ctype enum('T','H'),          -- ����Ÿ��(TEXT,HTML)
privacy enum('Y','N'),        -- ��аԽù�����
upfile char(40),              -- ���ε�����
upfile2 char(40),             -- ���ε�����
upfile3 char(40),             -- ���ε�����
passwd char(30),              -- ��й�ȣ
count int(8),                 -- ��ȸ��
recom int(8),						-- ��õ
ip char(15),						-- IP
wdate date,                   -- �ۼ���

primary key(idx),
index(code)  

);