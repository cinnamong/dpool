create table wiz_consult(

idx int(10) auto_increment not null,   -- 키
memid char(20),                        -- 회원아이디
name char(20),                         -- 회원이름
subject char(250),                     -- 제목
question text,                         -- 질문내용
answer text,                           -- 답변내용
wdate date,                            -- 작성일
status enum('Y','N'),                  -- 처리상태
PRIMARY KEY(idx),  
INDEX (memid)

);