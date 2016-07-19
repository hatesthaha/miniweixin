<?php
namespace wanhunet\weixin\core;

use Yii;
use Yii\base\Event;
use Yii\web\HttpException;
use wanhunet\weixin\core\Http;
use wanhunet\weixin\core\AccessToken;


trait Menu{

    /**
     * 自定义菜单创建接口(创建菜单)
     * @param array $buttons 菜单结构字符串
     * ~~~
     *  $this->createMenu([
     *      [
     *           'type' => 'click',
     *           'name' => '今日歌曲',
     *           'key' => 'V1001_TODAY_MUSIC'
     *      ],
     *      [
     *           'type' => 'view',
     *           'name' => '搜索',
     *           'url' => 'http://www.soso.com'
     *      ]
     *      ...
     * ]);
     * ~~~
     * @return bool
     */
    public function createMenu(array $buttons)
    {
        $http = new Http();
        $result = $http->httpRaw(self::WECHAT_MENU_CREATE_PREFIX, [
            'button' => $buttons
        ], [
            'access_token' => $this->getAccessToken()
        ]);
        return isset($result['errmsg']) && $result['errmsg'] == 'ok';
    }


    /**
     * 自定义菜单查询接口(获取菜单)
     * @return bool
     */
    public function getMenu()
    {
        $http = new Http();
        $result = $http->httpGet(self::WECHAT_MENU_GET_PREFIX, [
             'access_token' => $this->getAccessToken()
        ]);
        return isset($result['menu']['button']) ? $result['menu']['button'] : false;
    }


    /**
     * 自定义菜单删除接口(删除菜单)
     * @return bool
     */
    public function deleteMenu()
    {
        $http = new Http();
        $result = $http->httpGet(self::WECHAT_MENU_DELETE_PREFIX, [
             'access_token' => $this->getAccessToken()
        ]);
        return isset($result['errmsg']) && $result['errmsg'] == 'ok';
    }


    /**
     * 获取自定义菜单配置接口
     * @return bool|mixed
     * @throws \yii\web\HttpException
     */
    public function getMenuInfo()
    {
        $http = new Http();
        $result = $http->httpGet(self::WECHAT_MENU_INFO_GET_PREFIX, [
            'access_token' => $this->getAccessToken()
        ]);
        return !array_key_exists('errcode', $result) ? $result : false;
    }

}