<?php

if (! function_exists('slack_notification')) {
    /**
     * XXXする関数
     *
     * @param string $text
     * @return string
     */
    function slack_notification($text, $url)
    {
        $message =  array(
            "username"   => "勤怠管理",
            "icon_emoji" => ":slack:",
            "attachments" => array(array("text" => $text)));
          $message_json = json_encode($message);
          $message_post = "payload=".urlencode($message_json);
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $message_post);
          curl_exec($ch);
          curl_close($ch);
        return 0;
    }
}