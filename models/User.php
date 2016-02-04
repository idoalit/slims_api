<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 12:36:57
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 12:59:10
 * ----------------------------------------------------------------------
 */

/**
* User Model
*/
class User extends ActiveRecord\Model
{
  # explicit table name since our table is not "Users" 
  static $table_name = 'user';
  # explicit pk since our pk is not "id" 
  static $primary_key = 'username';
}