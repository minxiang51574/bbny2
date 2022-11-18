<?php if (!defined('ClassCms')) {
    /*
     * @Author: Mx
     * @Date: 2022-11-18 14:12:11
     * @Description: 
     */

    exit();
} ?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no" />
    <title>{if isset($.title) && !empty($.title)}{$.title}{else}{$.channelname}{/if}</title>
    {if isset($.keywords)}
    <meta name="keywords" content="{$.keywords}">{br}{/if}
    {if isset($.description)}
    <meta name="description" content="{$.description}">{br}{/if}

    <script src="{template}js/jquery.min.js" type="text/javascript"></script>
    <script src="{template}js/jquery.scrollLoading.js" type="text/javascript"></script>
    <script src="{template}js/slick.min.js"></script>
    <script src="{template}js/aos.js"></script>
    <link type="text/css" rel="stylesheet" href="{template}css/nav.css" />
    <link type="text/css" rel="stylesheet" href="{template}css/style.css" />
    <link type="text/css" rel="stylesheet" href="{template}iconfont/iconfont.css" />
    <link type="text/css" rel="stylesheet" href="{template}css/serviceInfo.css" />
    <link type="text/css" rel="stylesheet" href="{template}css/product.css">
    <link type="text/css" rel="stylesheet" href="{template}css/news.css">

    <script src="{template}js/index.js"></script>


</head>