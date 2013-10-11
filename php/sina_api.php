<?php
/*
	api�ĵ�
	http://open.weibo.com/wiki/API%E6%96%87%E6%A1%A3_V2
*/
class sina_api
{
	public $access_token;
	public $user_id;
	public $api_url = 'https://api.weibo.com/2/';
	
	function user_timeline($uid = NULL, $count = 100, $page = NULL, $feature = 1, $trim_user = 1)
	{
	/*
		uid				false	int64	��Ҫ��ѯ���û�ID��
		screen_name	false	string	��Ҫ��ѯ���û��ǳơ�
		since_id			false	int64	��ָ���˲������򷵻�ID��since_id���΢��������since_idʱ�����΢������Ĭ��Ϊ0��
		max_id			false	int64	��ָ���˲������򷵻�IDС�ڻ����max_id��΢����Ĭ��Ϊ0��
		count			false	int	��ҳ���صļ�¼��������󲻳���100��Ĭ��Ϊ20��
		page			false	int	���ؽ����ҳ�룬Ĭ��Ϊ1��
		base_app		false	int	�Ƿ�ֻ��ȡ��ǰӦ�õ����ݡ�0Ϊ���������ݣ���1Ϊ�ǣ�����ǰӦ�ã���Ĭ��Ϊ0��
		feature			false	int	��������ID��0��ȫ����1��ԭ����2��ͼƬ��3����Ƶ��4�����֣�Ĭ��Ϊ0��
		trim_user		false	int	����ֵ��user�ֶο��أ�0����������user�ֶΡ�1��user�ֶν�����user_id��Ĭ��Ϊ0��
	*/
	
		$getjson = $this->api_url . 'statuses/user_timeline.json?';
		if($uid != NULL) $getjson = $getjson .  '&uid=' . $uid;
		$getjson =$getjson .  '&count=' . $count;
		if($page != NULL) $getjson =$getjson .  '&page=' . $page;
		$getjson =$getjson .  '&feature' . $feature;
		$getjson =$getjson .  '&trim_user=' . $trim_user;
		$getjson =$getjson .  '&access_token=' . $this->access_token;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL,$getjson);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		$content = curl_exec($ch); 
		$return = json_decode($content, true);
		return $return;
	}



	function place_user_timeline($uid = NULL, $count = 20, $page = NULL)
	{
	/*
		uid			true	int64	��Ҫ��ѯ���û�ID��
		since_id		false	int64	��ָ���˲������򷵻�ID��since_id���΢��������since_idʱ�����΢������Ĭ��Ϊ0��
		max_id		false	int64	��ָ���˲������򷵻�IDС�ڻ����max_id��΢����Ĭ��Ϊ0��
		count		false	int	��ҳ���صļ�¼���������Ϊ50��Ĭ��Ϊ20��
		page		false	int	���ؽ����ҳ�룬Ĭ��Ϊ1��
		base_app	false	int	�Ƿ�ֻ��ȡ��ǰӦ�õ����ݡ�0Ϊ���������ݣ���1Ϊ�ǣ�����ǰӦ�ã���Ĭ��Ϊ0��
	*/
	
		$getjson = $this->api_url . 'place/user_timeline.json?';
		if($uid != NULL) $getjson = $getjson .  '&uid=' . $uid;
		$getjson =$getjson .  '&count=' . $count;
		if($page != NULL) $getjson =$getjson .  '&page=' . $page;
		$getjson =$getjson .  '&access_token=' . $this->access_token;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL,$getjson);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		$content = curl_exec($ch); 
		$return = json_decode($content, true);
		return $return;
	}

	function place_nearby_timeline($lat = NULL, $long = NULL, $count = 50, $range = 2000, $sort = 0)
	{
	/*
		lat			true	float	γ�ȡ���Ч��Χ��-90.0��+90.0��+��ʾ��γ��
		long			true	float	���ȡ���Ч��Χ��-180.0��+180.0��+��ʾ������
		range		false	int	������Χ����λ�ף�Ĭ��2000�ף����11132�ס�
		starttime	false	int	��ʼʱ�䣬Unixʱ�����
		endtime	false	int	����ʱ�䣬Unixʱ�����
		sort			false	int	����ʽ��Ĭ��Ϊ0����ʱ������Ϊ1ʱ�������ĵ�����������
		count		false	int	��ҳ���صļ�¼���������Ϊ50��Ĭ��Ϊ20��
		page		false	int	���ؽ����ҳ�룬Ĭ��Ϊ1��
		base_app	false	int	�Ƿ�ֻ��ȡ��ǰӦ�õ����ݡ�0Ϊ���������ݣ���1Ϊ�ǣ�����ǰӦ�ã���Ĭ��Ϊ0��
		offset		false	int	����ľ�γ���Ƿ��Ǿ�ƫ����0��û��ƫ��1����ƫ����Ĭ��Ϊ0��
	*/
	
		$getjson = $this->api_url . 'place/nearby_timeline.json?';
		if($lat != NULL) $getjson = $getjson .  '&lat=' . $lat;
		if($long != NULL) $getjson = $getjson .  '&long=' . $long;
		if($range != 2000) $getjson =$getjson .  '&range=' . $range;
		if($sort != 0) $getjson = $getjson .  '&sort=' . $sort;
		$getjson = $getjson .  '&count=' . $count;
		$getjson =$getjson .  '&access_token=' . $this->access_token;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL,$getjson);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		$content = curl_exec($ch); 
		$return = json_decode($content, true);
		return $return;
	}
	
	function friendships_friends_ids($uid = NULL, $count = 5000)
	{
	/*
	uid				false	int64	��Ҫ��ѯ���û�UID��
	screen_name	false	string	��Ҫ��ѯ���û��ǳơ�
	count			false	int	��ҳ���صļ�¼������Ĭ��Ϊ500����󲻳���5000��
	cursor			false	int	���ؽ�����α꣬��һҳ�÷���ֵ���next_cursor����һҳ��previous_cursor��Ĭ��Ϊ0��
	*/
		
		$getjson = $this->api_url . 'friendships/friends/ids.json?';
		if($uid != NULL) $getjson = $getjson .  '&uid=' . $uid;
	    $getjson = $getjson .  '&count=' . $count;
		$getjson =$getjson .  '&access_token=' . $this->access_token;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL,$getjson);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		$content = curl_exec($ch); 
		$return = json_decode($content, true);
		return $return;
	}
	
	function place_friends_timeline($count = 50, $type = 0)
	{
	/*
	count	false	int	��ҳ���صļ�¼���������Ϊ50��Ĭ��Ϊ20��
	page	false	int	���ؽ����ҳ�룬Ĭ��Ϊ1��
	type		false	int	��ϵ���ˣ�0�������ع�ע�ģ�1�����غ��ѵģ�Ĭ��Ϊ0��
	*/
		
		$getjson = $this->api_url . 'place/friends_timeline.json?';
	    $getjson = $getjson .  '&count=' . $count;
		$getjson =$getjson .  '&access_token=' . $this->access_token;
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL,$getjson);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		$content = curl_exec($ch); 
		$return = json_decode($content, true);
		return $return;
	}
	
}
?>