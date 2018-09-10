CREATE TABLE `message` (
  `id`      int(11)      not null primary key auto_increment,
  `title`   varchar(255) NOT NULL,
  `content` text         NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8;