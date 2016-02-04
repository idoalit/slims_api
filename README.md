# SLiMS API

REST API for SLiMS Application. This application uses the Slim Framework 3.

## Installing

* Clone this repository

```
$ git clone https://github.com/idoalit/slims_api.git
```

* goto application directory

```
$ cd slims_api
```

* Run composer install

```
$ composer install
```

* Create new table in your database to store token

```
CREATE TABLE `token` (
  `token` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `expire` datetime NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB;
```

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

## Authors

* **Waris Agung Widodo** - *Librarian* - [idoalit](https://github.com/idoalit)

## License

This project is licensed under the GNU GPL V3 License - see the [gnu.org](http://www.gnu.org/licenses/gpl-3.0.en.html) for details