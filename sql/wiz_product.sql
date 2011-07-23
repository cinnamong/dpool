drop table wiz_product;

create table wiz_product(

prdcode char(10) not null,    -- ��ǰ�ڵ�
prdname char(100),            -- ��ǰ��
prdcom char(50),          		-- ������
origin char(50),              -- ������
showset enum('Y','N'),        -- ��������
stock int(5),              	-- ���
savestock int(5),             -- ��������
prior bigint(14),             -- �켱����

viewcnt int(5),               -- ��ȸ��
deimgcnt int(5),					-- ���̹���

sellprice int(10),            -- �ǸŰ�
conprice int(10),             -- �Һ��ڰ�
reserve int(10),              -- ������

new enum('Y','N'),            -- �Ż�ǰ
popular enum('Y','N'),        -- �α��ǰ
recom enum('Y','N'),      		-- ��õ��ǰ
sale enum('Y','N'),           -- ���ϻ�ǰ
shortage enum('Y','N'),			-- ǰ����ǰ

opttitle char(50),				-- �ɼǸ�
optcode text,						-- �ɼǳ���
opttitle2 char(50),				-- �ɼǸ�
optcode2 text,						-- �ɼǳ���
opttitle3 char(50),				-- �ɼǸ�
optcode3 text,						-- �ɼǳ���

prdimg_R char(30),				-- ��ǰ��ǥ�̹���
prdimg_L1 char(30),         	-- ��ǰ�̹���1(��)
prdimg_M1 char(30),         	-- ��ǰ�̹���1(��)
prdimg_S1 char(30),         	-- ��ǰ�̹���1(��)
prdimg_L2 char(30),         	-- ��ǰ�̹���1(��)
prdimg_M2 char(30),         	-- ��ǰ�̹���1(��)
prdimg_S2 char(30),         	-- ��ǰ�̹���1(��)
prdimg_L3 char(30),         	-- ��ǰ�̹���1(��)
prdimg_M3 char(30),         	-- ��ǰ�̹���1(��)
prdimg_S3 char(30),         	-- ��ǰ�̹���1(��)
prdimg_L4 char(30),         	-- ��ǰ�̹���1(��)
prdimg_M4 char(30),         	-- ��ǰ�̹���1(��)
prdimg_S4 char(30),         	-- ��ǰ�̹���1(��)

searchkey char(255),				-- ��ǰ�˻�Ű����
stortexp char(255),     		-- ��ǰ��������
content text,                 -- ��ǰ����

primary key(prdcode)

);