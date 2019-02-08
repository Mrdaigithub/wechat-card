<?php
/**
 * Created by PhpStorm.
 * User: mrdai
 * Date: 2019-02-08
 * Time: 20:38
 */

namespace App\Http\Controllers;

use App\Events\MessageEvent;

class WebController extends Controller {
    protected function save_model($model) {
        if ( ! $model->save()) {
            return response("数据库存储失败");
        }

        return TRUE;
    }

    protected function response($message) {
        return "<script>alert('$message');document.write('<h1 style=\'text-align:center\'>$message</h1>')</script>";
    }

    protected function sendBroad($data) {
        return broadcast(new MessageEvent(json_encode($data)));
    }
}