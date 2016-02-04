<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 11:09:24
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 11:39:11
 * ----------------------------------------------------------------------
 */
/**
* Token model
*/
class Token extends ActiveRecord\Model
{
  # explicit table name since our table is not "tokens" 
  static $table_name = 'token';
  # explicit pk since our pk is not "id" 
  static $primary_key = 'token';
}