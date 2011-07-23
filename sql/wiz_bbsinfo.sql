--drop table wiz_bbsinfo;

create table wiz_bbsinfo(

code char(30),				-- 게시판코드
title char(50),			-- 타이틀
titleimg char(40),		-- 타이틀이미지

lpermi char(2),			-- 목록권한
rpermi char(2),			-- 읽기권한
wpermi char(2),			-- 쓰기권한

skin char(20),				-- 스킨타입
usetype enum('Y','N'),	-- 사용여부
upfile enum('Y','N'),	-- 파일업로드허용
comment enum('Y','N'),	-- 뎃글허용
remail enum('Y','N'),	-- 답글메일알림
imgview enum('Y','N'),	-- 첨부이미지 보기
abuse text,					-- 글필터링

rows int(3),				-- 페이지출력수
lists int(3),				-- 리스트출력수
new int(3),					-- new기간설정
hot int(3),					-- hot조회수설정

unique(code)

);