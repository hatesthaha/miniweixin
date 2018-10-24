<?php
/**
 * @author: wuwenhan <329576084@qq.com>
 * @copyright 综合管理系统
 * @link http://www.wanhunet.com
 */

namespace wanhunet\helpers;

use wanhunet\wanhunet;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Util
 * @package wanhunet\helpers
 * @author: wuwenhan <329576084@qq.com>
 * @copyright wanhunet
 * @link http://www.wanhunet.com
 */
class Utils
{
    //传入月份，获取当前季度01~12
    public static function getQuarterByMonth($date){
        $Q = ceil($date/3);
        return $Q;
    }

    /**
     * 导出数据为excel表格
     * @param array $data 一个二维数组,结构如同从数据库查出来的数组
     * @param array $title excel的第一行标题,一个数组,如果为空则没有标题
     * @param string $filename 下载的文件名
     * @examlpe
     * $stu = M ('User');
     * $arr = $stu -> select();
     * exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
     */
    public static function exportExcel($data = array(), $title = array(), $filename = 'report')
    {
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=" . $filename . ".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)) {
            foreach ($title as $k => $v) {
                $title[$k] = iconv("UTF-8", "GB2312", $v);
            }
            $title = implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)) {
            foreach ($data as $key => $val) {
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck] = iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key] = implode("\t", $data[$key]);

            }
            echo implode("\n", $data);
        }
    }

    public static function createcode($length = 8)
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x', 'y','z', 'A', 'B', 'C', 'D',
            'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        // 在 $chars 中随机取 $length 个数组元素键名
        $keys = array_rand($chars, $length);

        $password = '';
        for($i = 0; $i < $length; $i++)
        {
            // 将 $length 个数组元素连接成字符串
            $password .= $chars[$keys[$i]];
        }

        return $password;
    }
    //$c=1代表若未选周几则，默认上课时间为周一。,$da=16代表若未填写课时数，则默认课时数是16，填写则按照填写的走
    public static function munw($b,$e,$c=1,$da=16){
        $n=0;
        $t=array();
        $btime=strtotime($b[2]." ".Utils::getM($b[1])." ".$b[0]);
        $etime=strtotime($b[2]." ".Utils::getM($b[1])." ".$b[0])+365*24*3600;//截止时间=开始时间+一年的时间   因为回有调课，请假的情况，所以可能实际的截止时间要比截止时间晚的多（同样可能比用开始时间和课时计算出来的时间晚的多）

        for($i=$btime;$i<$etime;$i=$i+24*3600){
            if($n>=$da) {
                break;
            }
                if(date("N",$i)==$c){//date("N",$i)是周几：7、6、5、4、3、2、1、
                    $n++;
                    $t[]=date("Y-m-d",$i);
                }


        }

        return $t;
    }
    public static function munnum($b,$e,$c=1){
        $n=0;
        $t=array();
        $btime=strtotime($b[2]." ".Utils::getM($b[1])." ".$b[0]);
        $etime=strtotime($e[2]." ".Utils::getM($e[1])." ".$e[0].' 23:59:59');
        for($i=$btime;$i<$etime;$i=$i+86400){
            if(date("N",$i)==$c){
                $n++;
                $t[]=date("Y-m-d",$i);
            }
        }

        return $n;
    }
    public static function getM($m)
    {
        switch ($m) {
            case 1:
                return "January";
                break;
            case 2:
                return "February";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
        }
    }

    /**
     * 合并行为用于在params中的配置
     * @param $className
     * @param $parentEvents
     * @return array
     */
    public static function eventMerge($className, $parentEvents)
    {
        $behavior = isset(wanhunet::$app->params['events'][$className]) ? wanhunet::$app->params['events'][$className] : [];
        return ArrayHelper::merge($parentEvents, $behavior);
    }
    /**
     * 合并行为用于在params中的配置
     * @param $className
     * @param $parentBehaviors
     * @return array
     */
    public static function behaviorMerge($className, $parentBehaviors)
    {
        $behavior = isset(wanhunet::$app->params['behaviors'][$className]) ? wanhunet::$app->params['behaviors'][$className] : [];
        return ArrayHelper::merge($parentBehaviors, $behavior);
    }

    #字符串匹配，sunday算法
    public static function sunday($patt, $text) {
        $patt_size = strlen($patt);
        $text_size = strlen($text);

        #初始化字符串位移映射关系
        #此处注意,映射关系表的建立一定是从左到右，因为patten可能存在相同的字符
        #对于重复字符的位移长度，我们只能让最后一个重复字符的位移长度覆盖前面的位移长度
        #例如pattern = "testing",注意到此处有2个t，那么建立出来的位移映射是 shift[] = Array ( [t] => 4 [e] => 6 [s] => 5 [i] => 3 [n] => 2 [g] => 1 )
        #而如果不是从左到右，是从右到左的建立映射，就会变成 shift[] = Array ( [t] => 7 [e] => 6 [s] => 5 [i] => 3 [n] => 2 [g] => 1 )，这样到时候匹配就无法得到正确结果
        for ($i = 0; $i < $patt_size; $i++) {
            $shift[$patt[$i]] = $patt_size - $i;
        }

        $i = 0;
        $pipei =[];
        $limit = $text_size - $patt_size; #需要开始匹配的最后一个字符坐标
        while ($i <= $limit) {
            $match_size = 0; #当前已匹配到的字符个数
            #从i开始匹配字符串
            while ($text[$i + $match_size] == $patt[$match_size]) {
                $match_size++;
                if ($match_size == $patt_size) {
                   array_push($pipei,$i) ;
                    break;
                }
            }

            $shift_index = $i + $patt_size; #在text中比pattern的多一位的字符坐标
            if ($shift_index < $text_size && isset($shift[$text[$shift_index]])) {
                $i += $shift[$text[$shift_index]];
            } else {
                #如果映射表中没有这个字符的位移量，直接向后移动patt_size个单位
                $i += $patt_size;
            }
        }
        return $pipei;
    }

    /**
     * 创建目录（递归）
    */
    public static function makeDIR($dir)
    {
        if (is_dir($dir) || @mkdir($dir)) return TRUE;
        if (!self::makeDIR(dirname($dir))) return FALSE;
        return @mkdir($dir);
    }
    #上传文件
    public static function uploadfile($filetmpimg,$filename,$siteRoot){
        $tempPath = $filetmpimg;

        $filesName = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        $uploadPath = $siteRoot . $filesName;
        self::makeDIR(dirname($uploadPath));
        move_uploaded_file($tempPath, $uploadPath);

        $answer = array('newname' => $filesName,'oldname'=>$filename);
        $json = json_encode($answer);
        return $json;
    }



}