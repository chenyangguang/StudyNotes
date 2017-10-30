<?php

/*
 * Proxy Pattern
 */
interface IGoGame {
    public function login($user, $pwd); // 登录
    public function playGo(); // 下棋
    public function upgradeDuan(); // 升段
}

class GoPlayer implements IGoGame {
    private $name = '';

    public function login($user, $pwd) {
        // todo ...
        echo $user . '成功上线接受挑战了!' . PHP_EOL;
    }

    public function GoPlayer($username)
    {
        $this->name = $username;
    }

    public function playGo()
    {
        echo '正在下棋的' . $this->name . '是著名的职业八段' . PHP_EOL;
    }

    public function upgradeDuan()
    {
        echo $this->name . '终于升到九段了!' . PHP_EOL;
    }
}

class User {
    public static function MengBaiHeCup() {
        $user = new GoPlayer('AlphaGo');
        echo '网战开始' . date('Y-m-d H:i:s') . PHP_EOL;
        $user->login('alphago', 'apphago1234');
        $user->playGo();
        $user->upgradeDuan();
        echo '网战结束' . date('Y-m-d H:i:s') . PHP_EOL;
    }
}

var_dump(User::MengBaiHeCup());

    // 网战开始2017-10-30 16:15:48
    // alphago成功上线接受挑战了!
    // 正在下棋的AlphaGo是著名的职业八段
    // AlphaGo终于升到九段了!
    // 网战结束2017-10-30 16:15:48