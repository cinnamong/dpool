drop table wiz_member;

create table wiz_member(

id  char(20) not null,     -- ���̵�
passwd  char(20),          -- ��й�ȣ
name  char(20),            -- �̸�
resno char(14),            -- �ֹι�ȣ
email  char(50),           -- �̸���
tphone  char(14),          -- ��ȭ��ȣ
hphone  char(14),          -- �޴���
post  char(7),             -- �����ȣ
address  char(255),         -- �ּ�
address2  char(255),       -- ���ּ�
reemail  enum('Y','N'),    -- �̸��� ���ſ���
resms  enum('Y','N'),      -- sms ���ſ���
  
birthday  char(10),        -- ����
bgubun  char(1),           -- ���� ��,��('S','M')
marriage  char(1),         -- ��ȥ����('Y','N')
memorial  char(10),        -- ��ȥ�����
scholarship  char(2),      -- �з�
job  char(2),              -- ����
income char(2),            -- ����
car char(2),               -- �ڵ���
consph  char(80),          -- ���ɺо�(���)
conprd char(80),           -- ���ɹ�ǰ

level char(2),    			-- ȸ������ (������ȸ�� AM ���ȸ�� BM ��ȸ�� CM �Ϲ�ȸ�� DM)
recom char(20),            -- ��õ�� ���̵�
visit int(5),          		-- �湮ȸ��
visit_time date,				-- ������ �湮��
wdate datetime,            -- ������

PRIMARY KEY(id)
);