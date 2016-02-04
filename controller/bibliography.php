<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 11:58:57
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 16:39:55
 * ----------------------------------------------------------------------
 */

/**
 * Function to convert object data into array
 *
 * @param   object data
 *
 * @return  array
 */
function toArray($data_obj)
{
  $data = array_map(function ($res)
  {
    return $res->to_array();
  }, $data_obj);

  return $data;
}


/**
 * Group biblio path
 */
$app->group('/biblio', function () use ($app)
{
  /**
   * Biblio list
   *
   * @path    /biblio/list/token/limit/offset
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
    $datas    = Biblio::all($options);

    // convert into array
    $datas    = toArray($datas);
    $res = array();
    foreach ($datas as $data) {
      $res[] = array('id' => $data['biblio_id'], 'title' => $data['title']);
    }
    return $response->getBody()->write(json_encode($res));
  });


  /**
   * Biblio detile
   *
   * @path    /biblio/id/token
   *
   * @param   integer   id
   * @param   string    token
   *
   * @return  json
   */
  $app->get('/{id:[0-9]+}/{token}', function ($request, $response, $args)
  {
    $datas = Biblio::find('all', array('conditions' => array('biblio_id = ?', $args['id'])));
    $datas    = toArray($datas);
    return $response->getBody()->write(json_encode($datas));
  });


  /**
   * Biblio update
   *
   * @path    /biblio/update/id/token
   *
   * @param   integer   id
   * @param   string    token
   *
   * @return  boolean
   */
  $app->put('/update/{id:[0-9]+}/{token}', function ($request, $response, $args)
  {
    
  });


  /**
   * Biblio delete
   *
   * @path    /biblio/delete/id/token
   *
   * @param   integer   id
   * @param   string    token
   *
   * @return  boolean
   */
  $app->delete('/delete/{id:[0-9]+}/{token}', function ($request, $response, $args)
  {
    $post = Biblio::find_by_biblio_id($args['id']);
    $post->delete();
  });

})->add($validate); // inject middleware token auth