<?php

//引入配置
function confInit()  {
    if (is_file('./.env')) {
        $env = parse_ini_file('./.env', true);   //解析env文件,name = PHP_KEY
        foreach ($env as $key => $val) {
            $name = strtoupper($key);
            putenv("$name=$val");
        }
    }
}
