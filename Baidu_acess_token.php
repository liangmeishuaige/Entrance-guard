<?php
function request_post($url = '', $param = '') {
        if (empty($url) || empty($param)) {
            return false;
        }
        
        $postUrl = $url;
        $curlPost = $param;
        $curl = curl_init();//��ʼ��curl
        curl_setopt($curl, CURLOPT_URL,$postUrl);//ץȡָ����ҳ
        curl_setopt($curl, CURLOPT_HEADER, 0);//����header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//Ҫ����Ϊ�ַ������������Ļ��
        curl_setopt($curl, CURLOPT_POST, 1);//post�ύ��ʽ
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($curl);//����curl
        curl_close($curl);
        
        return $data;
    }

	$url = 'https://aip.baidubce.com/oauth/2.0/token';
    $post_data['grant_type']       = 'client_credentials';
    $post_data['client_id']      = 'LSfn1X7S0FqfDq1GvxTGloVe';//API Key
    $post_data['client_secret'] = 'NkPvLLkO3EmDmI7VsMXloYKCZUhbZ9VY';//Secret Key
    $o = "";
    foreach ( $post_data as $k => $v ) 
    {
    	$o.= "$k=" . urlencode( $v ). "&" ;
    }
    $post_data = substr($o,0,-1);
    
    $res = request_post($url, $post_data);

    var_dump($res);

?>