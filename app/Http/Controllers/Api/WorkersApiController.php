<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Transformers\UserTransformer;
class WorkersApiController extends BaseController
{
    public function users(){　　
    	$user->all();    //这里也可以写成一些where条件
    	return $this->response->collection($user, new UserTransformer);
　　}
}