<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TestModel;
class TestController extends Controller
{
    /**ceapi测试注册 */
    public function reg()
    {

    }
    /**测试登录 */
    public function login(Request $request)
    {
        echo "<pre>";
        print_r($request->input());echo"</pre>";
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        if($pass1 != $pass2){
            die("密码不一致");
        }
        $password = password_hash($pass1,PASSWORD_BCRYPT);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'last_time' => time(),
            'last_ip' => $request->ip(),//获取用户的登录ip
        ];
        $id = TestModel::insertGetId($data);
        dump($id);
    }
}
