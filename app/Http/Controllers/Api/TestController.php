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
            'last_login' => time(),
            'last_ip' => $request->ip(),//获取用户的登录ip()
        ];
        $id = TestModel::insertGetId($data);
        dump($id);
    }
   
    /**周考测试 */
    public function ascii()
    {
        $data =$_GET['data'];
        $data = "huahua";      
        $length =strlen($data);
        echo $length;echo '</br>';
        $pass = "";
        for($i=0;$i<$length;$i++)
        {
            echo $data[$i] .'>>>'.ord($data[$i]);echo '</br>';
            // echo $char[$i] .'>>>'.ord($char[$i]);echo '</br>';
            $ord = ord($data[$i]) + 3;
            $chr =chr($ord);
            echo $data[$i].'>>>'.$ord .'>>>'.$chr;echo '</br>';
            $pass .=$chr;
        }
        echo '</br>';
        echo $pass;
    }
    public function dec()
    {
             $data =$_GET['data'];
             $data = "kxdkxd";
            // $enc ="L#oryh#|rx";
            echo "密文:".$data;echo '<hr>';
            $length=strlen($data);
            $str ="";
            for($i=0;$i<$length;$i++){
                $ord = ord($data[$i]) - 3;
                $chr =chr($ord);
                echo $ord .'>>>'.$chr;echo '</br>';
                $str .=$chr;
            }
             echo "解文：".$str;
    }
}
