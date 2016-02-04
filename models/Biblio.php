<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 11:14:05
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 15:57:17
 * ----------------------------------------------------------------------
 */
/**
* Biblio model
*/
class Biblio extends ActiveRecord\Model
{
  # explicit table name since our table is not "biblios" 
  static $table_name = 'biblio';
  # explicit pk since our pk is not "id" 
  static $primary_key = 'biblio_id';
}