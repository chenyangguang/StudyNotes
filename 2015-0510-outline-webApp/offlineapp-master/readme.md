#如何进行离线改造

模块                        文件                         存储方式
|                            |
主页                ->      index.html                -> Application Cache
                            JQuery.js
Controller          ->      applicationController.js  -> Local Storage
                    ->      JQuery.js

View                ->      templates.js              -> Local Storage

                            Css文件

Model               ->      article.js                 -> Local Storage

                            database.js
                            数据                        -> Web SQL



#HTML5支持的离线存储方式

1, 应用程序缓存

2, 本地存储 -- Local Storage

3, 本地数据库  -- Web SQL

