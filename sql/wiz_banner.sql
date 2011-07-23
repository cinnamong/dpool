drop table wiz_banner;

create table wiz_banner(

idx int(3) auto_increment not null,
align enum('R','L'),			-- 배치
prior int(3),					-- 우선순위
isuse enum('Y','N'),			-- 사용여부
link_url varchar(255),		-- 링크주소
link_target enum('_SELF','_BLANK'),	-- 링크타겟
de_type enum('IMG','HTML'),-- 디자인타입
de_img varchar(100),			-- 배너이미지
de_html text,					-- 배너내용

primary key(idx)

);