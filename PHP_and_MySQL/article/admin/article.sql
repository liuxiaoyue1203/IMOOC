#创建数据库
create database info;

ALTER DATABASE info CHARACTER SET =  utf8; 

#创建article数据表
create table article (
		id int(11) not null auto_increment primary key,
		title char(100) not null ,
		author char(50) not null,
		description varchar(255) not null ,
		content text not null,
		dateline int(11) not null default 0
);
#插入记录
insert into article(title, author, description, content)
values('我的第一篇文章','yue','第一篇文章','晓跃的第一篇文章');

create table introduce(
		about varchar(255) not null,
		contact varchar(255) not null
);

insert into introduce(about, contact)
values('about me ...','contact');