drop table wiz_mailsms;

create table wiz_mailsms(

code char(20) not null,
subject char(255),

sms_cust enum('Y','N'),
sms_oper enum('Y','N'),
sms_msg char(100),

email_subj char(255),
email_cust enum('Y','N'),
email_oper enum('Y','N'),
email_hmsg text,
email_fmsg text,

primary key(code)
);

insert into wiz_mailsms values('mem_notice', '[ȸ������] �������Ϲ߼۽�', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_apply', '[ȸ������] ȸ�����Խ�', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_out', '[ȸ������] ȸ��Ż���', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_idpw', '[ȸ������] ���̵�/��й�ȣ ã���', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_com', '[�ֹ�����] �ֹ��Ϸ��', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_pay', '[�ֹ�����] �Ա�Ȯ�ν�', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_deliver', ' [�ֹ�����] ���ó����', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_cancle', ' [�ֹ�����] �ֹ���ҽ�', 'Y','Y','','','Y','Y','','');