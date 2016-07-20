<?php
require_once __DIR__ . '/boostrap.php';

//http://i.app.cf.weibo.com/api/crowdfunding/admin/project/search
$s = <<<MOCK
{   
    "code": "100000",
    "msg": "success",
    "data": {
        "total": "@int(50, 1000)",
        "list|2": {
            "id": "@inc('project_id')",
            "project_id": "1@date('dHis')@string('number', 3)@string('number', 3)@natural(0, 9)",
            "uid": "@natural(10000, 9999999999)",
            "catalogs": "@pick(\"娱乐|电影|音乐|出版|旅游|游戏\", 1, 5, '.')",
            "classic": "1",
            "name": "@ctitle(10, 30)",
            "dest_fund_amount": "@float(10000, 100000, 2, 2)",
            "current_fund_amount": "@float(10000, 1000000, 2, 2)",
            "max_fund_amount": "@float(5000000, 10000000, 2, 2)",
            "start_funding": "@date('Y-m-d 00:00:00', '-2 days', '+2 days')",
            "end_funding": "@date('Y-m-d 00:00:00', '+10 days', '+20 days')",
            "cast": "@natural(10000, 9999999999)",
            "description": "@ctitle(50, 100)",
            "large_image": "93ae921cjw1f5s4bbm97bj20hs08wmzq",
            "small_image": "93ae921cjw1f5s4bcxffej203w03waa8",
            "project_video_url": "",
            "detail_url": "",
            "qualifications": "{'0':{'file_id':'@int(100000000000000, 9999999999999999)','file_name':'营业执照.jpg','description':'营业执照'}}",
            "audit": "@natural(0, 10)",
            "sort_weight": "@natural(0, 10)",
            "favourites": "@natural(0, 1)",
            "supported": "@natural(0, 100000)",
            "notice": "",
            "publish_date": "@datetime('', '-5 days', '-1 days')",
            "date_added": "@datetime('', '-10 days', '-5 days')",
            "extend": "",
            "deleted": "0",
            "publish_platform": "微博众筹平台",
            "deposit": "@float(0, 0, 4, 4)",
            "userdefined_link": "",
            "detail_content": "@inc('detail_id')@ctitle(50, 100)&lt;p&gt;&lt;img src=&quot;@image('592x2000', '', '', 'png', '众筹')&quot; alt=&quot;品牌落地页-(2)_01.jpg&quot; height=&quot;2000&quot; width=&quot;592&quot;&gt;@ctitle(50, 100)&lt;p&gt;&lt;img src=&quot;@image('592x2000', '', '', 'png', '众筹')&quot; alt=&quot;品牌落地页-(2)_01.jpg&quot; height=&quot;2000&quot; width=&quot;592&quot;&gt;",
            "company": "@ctitle(5, 15)",
            "status": "@natural(0, 10)",
            "screen_name": "@ctitle(5, 15)"
        },
        "isAdmin": "@bool()"
    },
    "_MOCK_": [
        {
            "function": "redirect",
            "url": "http://sample.weibo.com?rid=@natural()&pid=@request('pid', '0')",
            "ms": "@int(100, 500)"
        },
        {
            "function": "sleep",
            "ms": "@int(100, 500)"
        },
        {
            "function": "callback",
            "url": "http://alleria.mcp.wap.grid.sina.com.cn/health",
            "ms": [
                "@int(1000, 2000)",
                "@int(4000, 8000)",
                "@int(10000, 16000)"
            ]
        }
    ]
} 
MOCK;
echo json_encode(Mock\Mock::mock($s), JSON_PRETTY_PRINT) . PHP_EOL;

