# Mock

Simulation data generator for API.

A PHP version of [Mock.js](http://mockjs.com/)

## Server

- [Mock.Server](https://github.com/pythias/mock.server)

## Examples

### API

```
$s = <<<MOCK
{
    "statuses|10": [
        {
            "created_at": "@date('D M d H:i:s O Y')",
            "id": "@define('mid')",
            "mid": "\"@define('mid')\"",
            "idstr": "\"@define('mid')\"",
            "text": "@csentence()",
            "source": "微游戏",
            "favorited": "@bool()",
            "truncated": "@bool()",
            "in_reply_to_status_id": "",
            "in_reply_to_user_id": "",
            "in_reply_to_screen_name": "",
            "geo": {
                "type": "Point",
                "coordinates": [
                    0,
                    0
                ]
            },
            "user": {
                "id": "@define('uid')",
                "idstr": "\"@define('uid')\"",
                "screen_name": "@define('name')",
                "name": "@define('name')",
                "province": "100",
                "city": "1000",
                "location": "其他",
                "description": "@ctitle(5, 20)",
                "url": "",
                "profile_image_url": "http://tp4.sinaimg.cn/@define('uid')/50/1/1",
                "domain": "",
                "gender": "@pick('mf')",
                "followers_count": "@int(1, 1000000)",
                "friends_count": "@int(1, 2000)",
                "statuses_count": "@int(1, 100000)",
                "favourites_count": "@int(1, 100)",
                "created_at": "@date('D M d H:i:s O Y')",
                "following": "@bool()",
                "allow_all_act_msg": "@bool()",
                "geo_enabled": "@bool()",
                "verified": "@bool()",
                "verified_type": -1,
                "allow_all_comment": "@bool()",
                "avatar_large": "http://tp4.sinaimg.cn/@define('uid')/180/1/1",
                "verified_reason": "",
                "follow_me": "@bool()",
                "online_status": 1,
                "bi_followers_count": "@int(1, 100)",
                "lang": "zh-cn",
                "level": 1,
                "type": 1,
                "badge": {}
            },
            "annotations": [
                {
                    "server_ip": "10.73.19.156"
                }
            ],
            "reposts_count": "@int(1, 100)",
            "comments_count": "@int(1, 100)",
            "mlevel": 0
        }
    ],
    "hasvisible": false,
    "previous_cursor": 0,
    "next_cursor": 0,
    "total_number": "@int(1, 100)",
    "_DEFINE_" : {
        "mid": "@string('number', 16, 16)",
        "uid": "@string('number', 10, 10)",
        "name": "@ctitle(2, 8)"
    }
}
MOCK;

```

### Address

```
\Mock\Mock::mock("@province()");
\Mock\Mock::mock("@city()");
\Mock\Mock::mock("@country()");
\Mock\Mock::mock("@zip()");
```

### Array

```
\Mock\Mock::mock('{"rows|2":{"v":"@int(1,100)"}}');
\Mock\Mock::mock('{"rows|@int(1,10)":{"v":"@int(1,100)"}}');
\Mock\Mock::mock('{"rows|@define(\'count\')":{"v":"@int(1,100)"},"_DEFINE_":{"count":"@int(1, 5)"}}');
```

### Basic

```
\Mock\Mock::mock("@bool(10, false)");
\Mock\Mock::mock("@natural()");
\Mock\Mock::mock("@int()");
\Mock\Mock::mock("@float()");
\Mock\Mock::mock("@character()");
\Mock\Mock::mock("@character('number')");
\Mock\Mock::mock("@character('upper')");
\Mock\Mock::mock("@character('symbol')");
\Mock\Mock::mock("@character('lower')");
\Mock\Mock::mock("@character('alpha')");
\Mock\Mock::mock("@string()");
\Mock\Mock::mock("@string(1)");
\Mock\Mock::mock("@string(1, 7)");
\Mock\Mock::mock("@string('upper', 1, 7)");
\Mock\Mock::mock("@str()");
\Mock\Mock::mock("@str(1)");
\Mock\Mock::mock("@str(1, 7)");
\Mock\Mock::mock("@str('upper', 1, 7)");
\Mock\Mock::mock("@range(10)");
\Mock\Mock::mock("@range(3, 7)");
\Mock\Mock::mock("@range(1, 10, 2)");
\Mock\Mock::mock("@range(1, 10, 3)");
```

### Date 

```
\Mock\Mock::mock("@date()");
\Mock\Mock::mock("@date('Y-m-d')");
\Mock\Mock::mock("@date('Y-m-d H:i:s')");
\Mock\Mock::mock("@time()");
\Mock\Mock::mock("@time('A H:i:s')");
\Mock\Mock::mock("@time('a H:i:s')");
\Mock\Mock::mock("@now('year')");
\Mock\Mock::mock("@now('month')");
\Mock\Mock::mock("@now('week')");
\Mock\Mock::mock("@now('day')");
\Mock\Mock::mock("@now('day', 'Y/m/d')");
\Mock\Mock::mock("@now('hour')");
\Mock\Mock::mock("@now('minute')");
\Mock\Mock::mock("@now('second')");
\Mock\Mock::mock("@now()");
\Mock\Mock::mock("@past()");
\Mock\Mock::mock("@future()");
```

### Define

```
\Mock\Mock::mock('{"rows|@define(\'count\')":{"v":"@int(1,100)"},"_DEFINE_":{"count":"@int(1, 5)"}}');
```

### Helper

```
\Mock\Mock::mock('@urlencode(\'AAA\')');
\Mock\Mock::mock('@urlencode("AAA\'")');
\Mock\Mock::mock('@pick("T10|T11|T12|T21|T22|T31", 1, 5, ".")');
\Mock\Mock::mock('@pick("ABCDE")');
\Mock\Mock::mock('@pick("AB|BC|DE")');
```

### Http

```
\Mock\Mock::mock('@request("id")');
```

### Image

```
\Mock\Mock::mock("@image('')");
\Mock\Mock::mock("@image('')");
\Mock\Mock::mock("@image('', '#fafafa')");
\Mock\Mock::mock("@image('', '#dfdfdf', 'Foobar')");
\Mock\Mock::mock("@image('', '', '#adadad', 'Foobar')");
\Mock\Mock::mock("@image('', '#dfdfdf', '', 'png', 'Help!!')");
```

### Misc

```
\Mock\Mock::mock("@guid()");
\Mock\Mock::mock("@uuid()");
\Mock\Mock::mock("@id()");
\Mock\Mock::mock("@inc(1)");
\Mock\Mock::mock("@inc(10)");
```

### Name

```
\Mock\Mock::mock("@first()");
\Mock\Mock::mock("@last()");
\Mock\Mock::mock("@name()");
\Mock\Mock::mock("@cfirst()");
\Mock\Mock::mock("@clast()");
\Mock\Mock::mock("@cname()");
```

### Text

```
\Mock\Mock::mock("@paragraph()");
\Mock\Mock::mock("@paragraph(3)");
\Mock\Mock::mock("@paragraph(1, 3)");
\Mock\Mock::mock("@cparagraph()");
\Mock\Mock::mock("@cparagraph(2)");
\Mock\Mock::mock("@cparagraph(1, 3)");
\Mock\Mock::mock("@sentence()");
\Mock\Mock::mock("@sentence(5)");
\Mock\Mock::mock("@sentence(3, 5)");
\Mock\Mock::mock("@csentence()");
\Mock\Mock::mock("@csentence(5)");
\Mock\Mock::mock("@csentence(3, 5)");
\Mock\Mock::mock("@word()");
\Mock\Mock::mock("@word(5)");
\Mock\Mock::mock("@word(3, 5)");
\Mock\Mock::mock("@cword()");
\Mock\Mock::mock("@cword(5)");
\Mock\Mock::mock("@cword(3, 5)");
\Mock\Mock::mock("@title()");
\Mock\Mock::mock("@title(5)");
\Mock\Mock::mock("@title(3, 5)");
\Mock\Mock::mock("@ctitle()");
\Mock\Mock::mock("@ctitle(5)");
\Mock\Mock::mock("@ctitle(3, 5)");
```



