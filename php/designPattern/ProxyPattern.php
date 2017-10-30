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
        echo $this->name . '成功上线接受挑战了!' . PHP_EOL;
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

// 利用 Alphago 代理陪练
class GoPlayerProxy implements IGoGame {
    private $player = null;

    //构造传递谁来当陪练
    public function GoPlayerProxy(IGoGame $user)
    {
        $this->player = $user;
    }

    public function login($user, $pwd)
    {
        $this->player->login($user, $pwd);
    }

    // 代替陪练下棋
    public function playGo()
    {
        $this->player->playGo();
    }

    public function upgradeDuan()
    {
        $this->player->upgradeDuan();
    }
}


class User {
    public static function MengBaiHeCup() {
        $user = new GoPlayer('潜伏');
        $proxy = new GoPlayerProxy($user); // 定义一个代理陪练
        echo '内战开始' . date('Y-m-d H:i:s') . PHP_EOL;
        $proxy->login('AlphaGo', 'AlphaGo1234');
        $proxy->playGo();
        $proxy->upgradeDuan();
        echo '内战结束' . date('Y-m-d H:i:s') . PHP_EOL;
    }
}

// 开启 AlphaGo 老师的陪练模式
var_dump(User::MengBaiHeCup());


    // 内战开始2017-10-30 17:41:51
    // 潜伏成功上线接受挑战了!
    // 正在下棋的潜伏是著名的职业八段
    // 潜伏终于升到九段了!
    // 内战结束2017-10-30 17:41:51