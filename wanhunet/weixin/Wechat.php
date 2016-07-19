<?php
namespace wanhunet\weixin;

use Yii;
use yii\base\Event;
use yii\base\Component;
use yii\web\HttpException;
use yii\base\InvalidParamException;
use yii\base\InvalidConfigException;
use wanhunet\weixin\core\SwitchMessage;


class Wechat extends Component
{


    /**
     * Access Token更新后事件
     */
    const EVENT_AFTER_ACCESS_TOKEN_UPDATE = 'afterAccessTokenUpdate';
    /**
     * JS API更新后事件
     */
    const EVENT_AFTER_JS_API_TICKET_UPDATE = 'afterJsApiTicketUpdate';
    
    const WECHAT_OAUTH2_AUTHORIZE_URL = 'https://open.weixin.qq.com/connect/oauth2/authorize';
    const WECHAT_OAUTH2_ACCESS_TOKEN_PREFIX = '/sns/oauth2/access_token';
    const WECHAT_OAUTH2_ACCESS_TOKEN_REFRESH_PREFIX = '/sns/oauth2/refresh_token';
    const WEHCAT_SNS_USER_INFO_PREFIX = '/sns/userinfo';
    const WECHAT_SNS_AUTH_PREFIX = '/sns/auth';
    const API_TOKEN_GET = '/cgi-bin/token?';
    const WECHAT_JS_API_TICKET_PREFIX = '/cgi-bin/ticket/getticket';
    /**
     * 发送模板消息
     */
    const WECHAT_TEMPLATE_MESSAGE_SEND_PREFIX = '/cgi-bin/message/template/send';
    /**
     * 发送客服消息
     */
    const WECHAT_CUSTOM_MESSAGE_SEND_PREFIX = '/cgi-bin/message/custom/send';
    /**
     * 自定义菜单创建接口
     */
    const WECHAT_MENU_CREATE_PREFIX = '/cgi-bin/menu/create';

    /**
     * 自定义菜单查询
     */
    const WECHAT_MENU_GET_PREFIX = '/cgi-bin/menu/get';
    /**
     * 自定义菜单删除接口(删除菜单)
     */
    const WECHAT_MENU_DELETE_PREFIX = '/cgi-bin/menu/delete';
    /**
     * 获取自定义菜单配置接口
     */
    const WECHAT_MENU_INFO_GET_PREFIX = '/cgi-bin/get_current_selfmenu_info';
    /**
     * 微信接口基本地址
     */
    const WECHAT_BASE_URL = 'https://api.weixin.qq.com';
  
   
    protected $grant_type = 'client_credential';
    
    protected $http;
    
    protected $queryName = 'access_token';

    protected $_accessToken;

    /**
     * @var array
     */
    public $_jsApiTicket;
    /**
     * 数据缓存前缀
     * @var string
     */
    public $cachePrefix = 'cache_wechat_sdk_wwh';
    /**
     * 公众号appId
     * @var string
     */
    public $appId;
    /**
     * 公众号appSecret
     * @var string
     */
    public $appSecret;
    /**
     * 公众号接口验证token,可由您来设定. 并填写在微信公众平台->开发者中心
     * @var string
     */
    public $token;
    /**
     * 公众号消息加密键值
     * @var string
     */
    public $encodingAesKey;


    use \wanhunet\weixin\core\AccessToken;
    use \wanhunet\weixin\core\Authcode;
    use \wanhunet\weixin\core\JsApiTicket;
    use \wanhunet\weixin\core\SendMessage;
    use \wanhunet\weixin\core\Menu;
    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init()
    {
        if ($this->appId === null) {
            throw new InvalidConfigException('The "appId" property must be set.');
        } elseif ($this->appSecret === null) {
            throw new InvalidConfigException('The "appSecret" property must be set.');
        } elseif ($this->token === null) {
            throw new InvalidConfigException('The "token" property must be set.');
        } elseif ($this->encodingAesKey === null) {
            throw new InvalidConfigException('The "encodingAesKey" property must be set.');
        }
    }


    /**
     * 微信服务器请求签名检测
     * @param string $signature 微信加密签名，signature结合了开发者填写的token参数和请求中的timestamp参数、nonce参数。
     * @param string $timestamp 时间戳
     * @param string $nonce 随机数
     * @return bool
     */
    public function checkSignature($signature = null, $timestamp = null, $nonce = null)
    {
        $signature === null && isset($_GET['signature']) && $signature = $_GET['signature'];
        $timestamp === null && isset($_GET['timestamp']) && $timestamp = $_GET['timestamp'];
        $nonce === null && isset($_GET['nonce']) && $nonce = $_GET['nonce'];
        $tmpArr = [$this->token, $timestamp, $nonce];
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        return sha1($tmpStr) == $signature;
    }

    /**
     * 解析微信请求内容
     * @return array
     * @throws NotFoundHttpException
     */
    public function parseRequest()
    {
        $xml =  (array) simplexml_load_string(file_get_contents('php://input'), 'SimpleXMLElement', LIBXML_NOCDATA);
        if (empty($xml)) {
            Yii::$app->response->content = 'Request data parse failed!';
            Yii::$app->end();
        }
        $message = [];
        foreach ($xml as $attribute => $value) {
            $message[$attribute] = is_array($value) ? $value : (string) $value;
        }

        Yii::error($xml, __METHOD__);
        return $message;
    }
}