<?php
class Index{
    public function getInfo()
    {
    	//获取access_token
    	$appID = 'appid';
    	$secret = 'secret';
    	$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appID.'&secret='.$secret;
    	$aceessToken = getRequest($url);
    	$arr = json_decode($aceessToken,true);
    	//var_dump($arr);die;
    	$access_token =  $arr['access_token'];


    	//获取openid
    	$url2 = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$access_token.'&next_openid=';
    	$openId = getRequest($url2);
    	$arr2 = json_decode($openId,true);
    	//var_dump($arr2);die;

    	//单个id获取
    	//$open_id = $arr2['data']['openid'][1];
    	
    	//多个id获取
    	$openidList = $arr2['data']['openid'];
    	//var_dump($openidList);die;
    	
    	/*$data = "'user_list': [{
           'openid': 'oIVJuxGjHHY_TY6-Q81JN03z2nmE', 
           'lang': 'zh_CN'},{
           'openid': 'oIVJuxLov2lBoF4u_42WbtclSXxE', 
           'lang': 'zh_CN'}]";*/
        /*$data = array(
        	'openid' => 'oIVJuxGjHHY_TY6-Q81JN03z2nmE',
        	'lang' => 'zh_CN'
        	);*/

    	//获取单个用户基本信息
    	/*$url3 = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$open_id.'&lang=zh_CN';
    	$userinfo = getRequest($url3);
    	$arr3 = json_decode($userinfo,true);
    	var_dump($arr3);die;*/


    	//获取多个用户信息
    	/*$url4 = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$access_token;
    	$usersinfo = postRequest($url4,$data);
    	$arr4 = json_decode($usersinfo);
    	var_dump($arr4);*/
    	foreach ($openidList as $v) {
    		//echo $v;die;
    		$url3 = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$v.'&lang=zh_CN';
    		$userinfo = getRequest($url3);
    		$arr3 = json_decode($userinfo,true);
    		var_dump($arr3);
    	}
    }

    
}
