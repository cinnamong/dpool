create table wiz_consult(

idx int(10) auto_increment not null,   -- Ű
memid char(20),                        -- ȸ�����̵�
name char(20),                         -- ȸ���̸�
subject char(250),                     -- ����
question text,                         -- ��������
answer text,                           -- �亯����
wdate date,                            -- �ۼ���
status enum('Y','N'),                  -- ó������
PRIMARY KEY(idx),  
INDEX (memid)

);