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

insert into wiz_mailsms values('mem_notice', '[회원관련] 공지메일발송시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_apply', '[회원관련] 회원가입시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_out', '[회원관련] 회원탈퇴시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('mem_idpw', '[회원관련] 아이디/비밀번호 찾기시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_com', '[주문관련] 주문완료시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_pay', '[주문관련] 입금확인시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_deliver', ' [주문관련] 배송처리시', 'Y','Y','','','Y','Y','','');
insert into wiz_mailsms values('order_cancle', ' [주문관련] 주문취소시', 'Y','Y','','','Y','Y','','');