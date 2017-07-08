# MySQLに1000万行のデータを追加して検索の速度を検証するスクリプトです。

## DB作成
```
CREATE DATABASE testdb CHARACTER SET utf8;
grant all privileges on testdb.* to testuser@localhost identified by 'testpass';
```

## テーブル作成
### インデックスなし
```
CREATE TABLE `users` (
  `id`         bigint(20)   unsigned NOT NULL AUTO_INCREMENT,
  `email`      varchar(255) DEFAULT NULL,
  `password`   varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
```

### インデックスあり
```
CREATE TABLE `users` (
  `id`         bigint(20)   unsigned NOT NULL AUTO_INCREMENT,
  `email`      varchar(255) DEFAULT NULL,
  `password`   varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX idx_email(email)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
```


## Insert
```
php insert.php
```

## Select
```
php select.php
```


