drop table wiz_bbs;

create table wiz_bbs(

idx int(10) not null auto_increment,                  -- 해당게시판 키
code char(30),                -- 게시판코드
prino int(10),                -- 게시물정렬키
subno int(5),                 -- 답변정렬키
depno int(2),                 -- 답변깊이
notice char(1),               -- 공지글설정(Y)

memid char(20),					-- 작성자 아이디
name char(20),                -- 작성자 이름
email char(50),               -- 작성자이메일
subject char(100),            -- 제목
content text,                 -- 내용
ctype enum('T','H'),          -- 문서타입(TEXT,HTML)
privacy enum('Y','N'),        -- 비밀게시물설정
upfile char(40),              -- 업로드파일
upfile2 char(40),             -- 업로드파일
upfile3 char(40),             -- 업로드파일
passwd char(30),              -- 비밀번호
count int(8),                 -- 조회수
recom int(8),						-- 추천
ip char(15),						-- IP
wdate date,                   -- 작성일

primary key(idx),
index(code)  

);