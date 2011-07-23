drop table wiz_member;

create table wiz_member(

id  char(20) not null,     -- 아이디
passwd  char(20),          -- 비밀번호
name  char(20),            -- 이름
resno char(14),            -- 주민번호
email  char(50),           -- 이메일
tphone  char(14),          -- 전화번호
hphone  char(14),          -- 휴대폰
post  char(7),             -- 우편번호
address  char(255),         -- 주소
address2  char(255),       -- 상세주소
reemail  enum('Y','N'),    -- 이메일 수신여부
resms  enum('Y','N'),      -- sms 수신여부
  
birthday  char(10),        -- 생일
bgubun  char(1),           -- 생일 양,음('S','M')
marriage  char(1),         -- 결혼여부('Y','N')
memorial  char(10),        -- 결혼기념일
scholarship  char(2),      -- 학력
job  char(2),              -- 직업
income char(2),            -- 수입
car char(2),               -- 자동차
consph  char(80),          -- 관심분야(취미)
conprd char(80),           -- 관심물품

level char(2),    			-- 회원레벨 (마스터회원 AM 우수회원 BM 정회원 CM 일반회원 DM)
recom char(20),            -- 추천인 아이디
visit int(5),          		-- 방문회수
visit_time date,				-- 마지막 방문일
wdate datetime,            -- 가입일

PRIMARY KEY(id)
);