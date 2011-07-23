drop table wiz_category;

create table wiz_category(

catcode char(6) not null,           -- 카테고리넘버
depthno int(1),                     -- 분류 깊이
priorno01 int(2),                   -- 대분류 우선순위
priorno02 int(2),                   -- 중분류 우선순위
priorno03 int(2),                   -- 소분류 우선순위

catname char(30),                   -- 카테고리이름
catuse enum('Y','N'),               -- 카테고리사용용여부
catimg text,              				-- 카테고리 이미지
catimg_type char(3),						-- 이미지타입

prd_tema char(10),                  -- 상품진열테마 tema01 tema02
prd_num int(3),                     -- 상품진열수
prd_width int(3),							-- 상품가로크기
prd_height int(3),						-- 상품세로크기

recom_tema char(10),                -- 추천상품진열테마 tema01, tema02
recom_num int(3),                   -- 추천상품진열수

primary key(catcode)

);