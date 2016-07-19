<?php
namespace wanhunet\weixin\core;

use Yii;
use Yii\base\Event;
use Yii\web\HttpException;

class SwitchMessage
{
    use \wanhunet\weixin\core\SendMessage;
    /**
     * @descrpition 分发请求
     * @param $request
     * @return array|string
     */
    public static function switchType(&$request){
        $data = [];
        switch ($request['MsgType']) {
            //事件
            case 'event':
                $request['Event'] = strtolower($request['Event']);
                switch ($request['Event']) {
                    //关注
                    case 'subscribe':
                        //二维码关注
                        if(isset($request['EventKey']) && isset($request['Ticket'])){
                            $data = self::eventQrsceneSubscribe($request);
                            //普通关注
                        }else{
                            $data = self::eventSubscribe($request);
                        }
                        break;
                    //自定义菜单 - 点击菜单拉取消息时的事件推送
                    case 'click':
                        $data = self::eventClick($request);
                        break;
                    //自定义菜单 - 点击菜单跳转链接时的事件推送
                    case 'view':
                        $data = self::eventView($request);
                        break;
                }
                break;
            //文本
            case 'text':
                $data = self::text($request);
                break;
            //图像
            case 'image':
                $data = self::image($request);
                break;
            //语音
            case 'voice':
                $data = self::voice($request);
                break;
            //视频
            case 'video':
                $data = self::video($request);
                break;
            //小视频
            case 'shortvideo':
                $data = self::shortvideo($request);
                break;
            //位置
            case 'location':
                $data = self::location($request);
                break;
            //链接
            case 'link':
                $data = self::link($request);
                break;
            default:
                return $this->sendText($request['FromUserName'], '收到未知的消息，我不知道怎么处理');
                break;
        }

        return $data;
    }
    /**
     * @descrpition 文本
     * @param $request
     * @return array
     */
    public static function text(&$request){

        $content = '收到文本消息';
        return $this->sendText($request['FromUserName'], $content);
    }
    /**
     * @descrpition 图像
     * @param $request
     * @return array
     */
    public static function image(&$request){
   
        $content = '收到图片';
        return $this->sendText($request['FromUserName'],  $content);
    }

    /**
     * @descrpition 语音
     * @param $request
     * @return array
     */
    public static function voice(&$request){
  
        if(!isset($request['recognition'])){
            $content = '收到语音';
            return $this->sendText($request['FromUserName'],  $content);
        }else{
            $content = '收到语音识别消息，语音识别结果为：'.$request['recognition'];
            return $this->sendText($request['FromUserName'],  $content);
        }
    }

    /**
     * @descrpition 视频
     * @param $request
     * @return array
     */
    public static function video(&$request){

        $content = '收到视频';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 视频
     * @param $request
     * @return array
     */
    public static function shortvideo(&$request){

        $content = '收到小视频';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 地理
     * @param $request
     * @return array
     */
    public static function location(&$request){

        $content = '收到上报的地理位置';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 链接
     * @param $request
     * @return array
     */
    public static function link(&$request){
       
        $content = '收到连接';
        return $this->sendText($request['FromUserName'], $content);
    }
    /**
     * @descrpition 关注
     * @param $request
     * @return array
     */
    public static function eventSubscribe(&$request){
     
        $content = '欢迎您关注我们的微信，将为您竭诚服务.';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 取消关注
     * @param $request
     * @return array
     */
    public static function eventUnsubscribe(&$request){
      
        $content = '为什么不理我了？';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 扫描二维码关注（未关注时）
     * @param $request
     * @return array
     */
    public static function eventQrsceneSubscribe(&$request){

        $content = '欢迎您关注我们的微信，将为您竭诚服务.';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 扫描二维码（已关注时）
     * @param $request
     * @return array
     */
    public static function eventScan(&$request){
     
        $content = '您已经关注了哦～';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单拉取消息时的事件推送
     * @param $request
     * @return array
     */
    public static function eventClick(&$request){
        $content = '收到文本消息';
        return $this->sendText($request['FromUserName'], $content);
    }

    /**
     * @descrpition 自定义菜单 - 点击菜单跳转链接时的事件推送
     * @param $request
     * @return array
     */
    public static function eventView(&$request){
        //获取该分类的信息
        $eventKey = $request['eventkey'];
        $content = '收到跳转链接事件，您设置的key是' . $eventKey;
        return $this->sendText($request['fromusername'], $request['tousername'], $content);
    }
}