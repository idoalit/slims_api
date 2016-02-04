<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 17:57:33
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 19:19:22
 * ----------------------------------------------------------------------
 */

/**
 * Group member path
 */
$app->group('/member', function () use ($app)
{
  /**
   * Member list
   *
   * @path    /member/list/token/limit/offset
   *
   * @param   string    token
   * @param   integer   limit
   * @param   integer   offset
   *
   * @return  json
   */
  $app->get('/list/{token}[/{limit:[0-9]+}/{offset:[0-9]+}]', function ($request, $response, $args)
  {
    $limit    = (isset($args['limit'])) ? $args['limit'] : 10;
    $offset   = (isset($args['offset'])) ? $args['offset'] : 0;
    $options  = array('limit' => $limit, 'offset' => $offset);
    $datas    = Member::all($options);

    // convert into array
    $datas    = toArray($datas);
    $res = array();
    foreach ($datas as $data) {
      $res[] = array('id' => $data['member_id'], 'name' => $data['member_name']);
    }
    return $response->getBody()->write(json_encode($res));
  });


  /**
   * Member detile
   *
   * @path    /member/id/token
   *
   * @param   string    id
   * @param   string    token
   *
   * @return  json
   */
  $app->get('/{id}/{token}', function ($request, $response, $args)
  {
    $datas = Member::find('all', array('conditions' => array('member_id = ?', $args['id'])));
    $datas = toArray($datas);
    return $response->getBody()->write(json_encode($datas));
  });


  /**
   * Member Create
   *
   * @path    /member/create/token
   *
   * @param   string    token
   *
   * @return  boolean
   */
  $app->put('/create/{token}', function ($request, $response, $args)
  {
    /*coming soon*/
  });


  /**
   * Member update
   *
   * @path    /member/update/id/token
   *
   * @param   string   id
   * @param   string    token
   *
   * @return  boolean
   */
  $app->put('/update/{id}/{token}', function ($request, $response, $args)
  {
    /*coming soon*/
  });


  /**
   * Member delete
   *
   * @path    /member/delete/id/token
   *
   * @param   string   id
   * @param   string    token
   *
   * @return  boolean
   */
  $app->delete('/delete/{id}/{token}', function ($request, $response, $args)
  {
    $post = Member::find_by_member_id($args['id']);
    $post->delete();
    return $response->getBody()->write('Data member "'.$post->member_name.'" deleted.');
  });

})->add($validate); // inject middleware token auth