<?php
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
    $response->getBody()->write('Token invalid or expired!');
  }
  return $response;
};
