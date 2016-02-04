<?php
/**
 * ----------------------------------------------------------------------
 * @Author                : Waris Agung Widodo | ido alit
 * @Email                 : ido.alit@gmail.com
 * @Date                  : 2016-02-04 09:49:12
 * @Last Modified by      : Waris Agung Widodo | ido alit
 * @Last Modified time    : 2016-02-04 19:00:01
 * ----------------------------------------------------------------------
 */

// Application middleware
$validate = function ($request, $response, $next)
{
  // validating token
  // get token sent from ajax
  $tokenAuth = $request->getAttribute('routeInfo')[2]['token'];
  // compare with database
  $token = Token::find_by_token($tokenAuth);
  if ($token) {
    $response = $next($request, $response);
  } else {
    // token not valid will return status 401 (Unauthorized)
    $response = $response->withStatus(401);
  }
  return $response;
};
