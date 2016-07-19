<?php
namespace wanhunet\weixin\core;

use Yii;
use Yii\base\Event;
use Yii\web\HttpException;
use wanhunet\weixin\core\Http;
use wanhunet\weixin\core\AccessToken;


trait SendMessage{
     /**
     * 发送客服消息
     * @param array $data
     * @return bool
     * @throws \yii\web\HttpException
     */
    public function sendCustomMessage(array $data)
    {
        $http = new Http();
        $result = $http->httpRaw(self::WECHAT_CUSTOM_MESSAGE_SEND_PREFIX, $data, [
            'access_token' => $this->getAccessToken()
        ]);
        return isset($result['errmsg']) && $result['errmsg'] == 'ok';
    }


    /**
     * 发送模板消息
     * 示例数据
     * [
     *   "touser" => "接收消息的用户openid",
     *   "template_id" => "模板id",
     *   "url" => "http://weixin.qq.com/download",
     *   "topcolor" => "#FF0000",
     *   "data" => [
     *       "first" => [
     *           "value" => "恭喜你购买成功！",
     *           "color" => "#173177"
     *       ],
     *       "product" => [
     *           "value" => "巧克力",
     *           "color" => "#173177"
     *       ],
     *       "price" => [
     *           "value" => "39.8元",
     *           "color" => "#173177"
     *       ],
     *       "time" => [
     *           "value" => "2014年9月16日",
     *           "color" => "#173177"
     *       ],
     *       "remark" => [
     *           "value" => "欢迎再次购买！",
     *           "color" => "#173177"
     *       ]
     *   ]
     *
     *   ]
     * @param $toUser 关注者openID
     * @param $templateId 模板ID(模板需在公众平台模板消息中挑选)
     * @param array $data 模板需要的数据
     * @return int|bool
     */
    public function sendTemplateMessage( $toUser, $templateId, array $data)
    {
        $http = new Http();
        $result = $http->httpRaw(self::WECHAT_TEMPLATE_MESSAGE_SEND_PREFIX, array_merge([
            'url' => null,
            'touser' => $toUser,
            'template_id' => $templateId,
            'topcolor' => '#FF0000'
        ], $data), [
            'access_token' => $this->getAccessToken()
        ]);
        return isset($result['msgid']) ? $result['msgid'] : false;
    }

    /**
     * 发送文本客服信息
     * @param $openId 关注者openID
     * @param $content 文本消息内容
     * @return bool
     */
    public function sendText($openId, $content)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'text',
            'text' => [
                'content' => $content
            ]
        ]);
    }

    /**
     * 发送图片客服消息
     * @param string $openId 关注者openID
     * @param string $mediaId 发送的图片的媒体ID
     * @return bool
     */
    public function sendImage($openId, $mediaId)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'image',
            'voice' => [
                'media_id' => $mediaId
            ]
        ]);
    }

    /**
     * 发送声音客服消息
     * @param string $openId 关注者openID
     * @param string $mediaId 发送的语音的媒体ID
     * @return bool
     */
    public function sendVoice($openId, $mediaId)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'voice',
            'voice' => [
                'media_id' => $mediaId
            ]
        ]);
    }

    /**
     * 发送视频客服信息
     * @param string $openId 关注者openID
     * @param string $mediaId 发送的视频的媒体ID
     * @param string $thumbMediaId 缩略图的媒体ID
     * @param string $title 视频消息的标题
     * @param string $description 视频消息的描述
     * @return bool
     */
    public function sendVideo($openId, $mediaId, $thumbMediaId, $title = null, $description = null)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'video',
            'video' => [
                'media_id' => $mediaId,
                'thumb_media_id' => $thumbMediaId,
                'title' => $title,
                'description' => $description
            ]
        ]);
    }

    /**
     * 发送音乐客服消息
     * @param $openId 关注者openID
     * @param $thumbMediaId 缩略图的媒体ID
     * @param $musicUrl 音乐链接
     * @param $hqMusicUrl 高品质音乐链接，wifi环境优先使用该链接播放音乐
     * @param null $title 音乐标题
     * @param null $description 音乐描述
     * @return bool
     */
    public function sendMusic($openId, $thumbMediaId, $musicUrl, $hqMusicUrl, $title = null, $description = null)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'music',
            'music' => [
                'thumb_media_id' => $thumbMediaId,
                'musicurl' => $musicUrl,
                'hqMusicUrl' => $hqMusicUrl,
                'title' => $title,
                'description' => $description
            ]
        ]);
    }

    /**
     * 发送图文客服消息
     * @param $openId 关注者openID
     * @param array $articles 图文信息内容部分
     * ~~~
     * $articles = [
     *      'title' => 'Happy Day',
     *      'description' => 'Is Really A Happy Day',
     *      'url' => 'URL',
     *      'picurl' => 'PIC_URL'
     * ]
     * ~~~
     * @return bool
     */
    public function sendNews($openId, array $articles)
    {
        return $this->sendCustomMessage([
            'touser' => $openId,
            'msgtype' => 'news',
            'news' => [
                'articles' => $articles
            ]
        ]);
    }
   

}