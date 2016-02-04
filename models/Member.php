<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 18:02:16
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 18:02:50
 * ----------------------------------------------------------------------
 */
/**
* Member model
*/
class Member extends ActiveRecord\Model
{
  # explicit table name since our table is not "biblios" 
  static $table_name = 'member';
  # explicit pk since our pk is not "id" 
  static $primary_key = 'member_id';
}