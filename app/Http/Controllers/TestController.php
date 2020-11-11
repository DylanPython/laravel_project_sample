<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\BadRequestException;
use App\Rules\Validator;

class TestController extends Controller
{
    /**
     * 测试异常
     *
     */
    public function testException(Request $request)
    {
        $p = $request->input('p');
        if ($p == 0) {
            throw new BadRequestException('Invalid Parameter', 40103);
        }
    }

    /**
     * 测试请求验证
     *
     */
    public function testRequestValidate(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'present|num',
//            'time' => 'present|date_format:Y-m-d',
        ]);

        if (Validator::has_fails()) {
            throw new BadRequestException('Invalid Parameter', 40103);;
        }

        return $request->route()->uri();
    }
}
