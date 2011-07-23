drop table wiz_product;

create table wiz_product(

prdcode char(10) not null,    -- 상품코드
prdname char(100),            -- 상품명
prdcom char(50),          		-- 제조사
origin char(50),              -- 원산지
showset enum('Y','N'),        -- 진열여부
stock int(5),              	-- 재고량
savestock int(5),             -- 안전재고고량
prior bigint(14),             -- 우선순위

viewcnt int(5),               -- 조회수
deimgcnt int(5),					-- 상세이미지

sellprice int(10),            -- 판매가
conprice int(10),             -- 소비자가
reserve int(10),              -- 적립금

new enum('Y','N'),            -- 신상품
popular enum('Y','N'),        -- 인기상품
recom enum('Y','N'),      		-- 추천상품
sale enum('Y','N'),           -- 세일상품
shortage enum('Y','N'),			-- 품절상품

opttitle char(50),				-- 옵션명
optcode text,						-- 옵션내용
opttitle2 char(50),				-- 옵션명
optcode2 text,						-- 옵션내용
opttitle3 char(50),				-- 옵션명
optcode3 text,						-- 옵션내용

prdimg_R char(30),				-- 상품대표이미지
prdimg_L1 char(30),         	-- 상품이미지1(대)
prdimg_M1 char(30),         	-- 상품이미지1(중)
prdimg_S1 char(30),         	-- 상품이미지1(소)
prdimg_L2 char(30),         	-- 상품이미지1(대)
prdimg_M2 char(30),         	-- 상품이미지1(중)
prdimg_S2 char(30),         	-- 상품이미지1(소)
prdimg_L3 char(30),         	-- 상품이미지1(대)
prdimg_M3 char(30),         	-- 상품이미지1(중)
prdimg_S3 char(30),         	-- 상품이미지1(소)
prdimg_L4 char(30),         	-- 상품이미지1(대)
prdimg_M4 char(30),         	-- 상품이미지1(중)
prdimg_S4 char(30),         	-- 상품이미지1(소)

searchkey char(255),				-- 상품검색키워드
stortexp char(255),     		-- 상품간략설명
content text,                 -- 상품설명

primary key(prdcode)

);