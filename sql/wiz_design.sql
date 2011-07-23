drop table wiz_design;

create table wiz_design(

site_title varchar(30),				-- ºÓ«Œ∏Ù Title
site_intro varchar(255),			-- º“∞≥±€
site_keyword varchar(255),			-- ≈∞øˆµÂ

site_align enum('LEFT','CENTER','RIGHT'),
site_bgcolor varchar(7),
site_background varchar(40),
site_font varchar(7),
site_link varchar(7),
site_active varchar(7),
site_hover varchar(7),
site_visited varchar(7),

header_type enum('SKIN','HTML'),
header_file varchar(40),

main_type enum('SKIN','HTML'),
main_file varchar(40),

footer_type enum('SKIN','HTML'),
footer_html text,

logo_img varchar(40),
cate_img varchar(40),
main_img varchar(40),
main_width int(3),
main_height int(3),
main_link varchar(255),
main_target varchar(20),
main_html text,
notice_img varchar(40),

topnavi01_url varchar(255),
topnavi02_url varchar(255),
topnavi03_url varchar(255),
topnavi04_url varchar(255),
topnavi05_url varchar(255),
topnavi06_url varchar(255),

topmenu01_img varchar(255),
topmenu02_img varchar(255),
topmenu03_img varchar(255),
topmenu04_img varchar(255),
topmenu05_img varchar(255),
topmenu06_img varchar(255),
topmenu07_img varchar(255),
topmenu08_img varchar(255),
topmenu09_img varchar(255),
topmenu10_img varchar(255)

topmenu01_url varchar(255),
topmenu02_url varchar(255),
topmenu03_url varchar(255),
topmenu04_url varchar(255),
topmenu05_url varchar(255),
topmenu06_url varchar(255),
topmenu07_url varchar(255),
topmenu08_url varchar(255),
topmenu09_url varchar(255),
topmenu10_url varchar(255)

);

insert into wiz_design(site_title) values(':: ¿ß¡Óº• «√∑ØΩ∫ ºÓ«Œ∏Ù ::');