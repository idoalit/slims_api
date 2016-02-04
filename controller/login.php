<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 12:32:35
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 15:13:27
 * ----------------------------------------------------------------------
 */

$app->post('/login/{username}/{password}', function ($request, $response, $args)
{
  // get password from database
  $users      = User::find($args['username']);
  $password   = $users->passwd;
  // verify password
  $verify     = password_verify($args['password'], $password);
  if ($verify) {
    $res['user']  = $users->username; // username for reference
    $res['token'] = bin2hex(openssl_random_pseudo_bytes(16)); // return generate randome token

    $token_expiration = date('Y-m-d H:i:s', strtotime('+1 hour')); // the expiration date will be in one hour from the current moment
    
    // update token into database
    // this methode will cause logout state in other device
    // because the token not valid again
    $token = Token::find_by_user_id($users->user_id);
    if ($token) {
      
      // update token
      $token->token = $token_expiration;
      $token->save();
      // write log
      $this->logger->info("Slim-Api '/' login");
      return $response->getBody()->write(json_encode($res));

    } else {
      
      // insert token
      $post = new Token();
      $post->token   = $res['token'];
      $post->user_id = $users->user_id;
      $post->expire  = $token_expiration;
      $post->save(); // insert into database
      // write log
      $this->logger->info("Slim-Api '/' login");
      // trow response json
      return $response->getBody()->write(json_encode($res));

    }

  } else {
    return $response->getBody()->write(json_encode(false));
  }
});