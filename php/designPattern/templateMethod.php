<?php

// 独孤九剑
abstract class Dugujiujian {
    // protected 将独孤九剑剑法的招式秘密都保护起来，宁可烂在华山也不轻易传给华山弟子
    protected abstract function zongjueStyle();
    protected abstract function pojianStyle();
    protected abstract function podaoStyle();
    protected abstract function pozhangStyle();
    protected abstract function poqiStyle();

    // final 关键字限定，不能随便改剑谱要诀
    final public function useDujiujian ()
    {
        $this->zongjueStyle();
        $this->pojianStyle();
        $this->podaoStyle();
        $this->pozhangStyle();

        // 如果功力深厚的，再教学破气式
        if(!$this->isGonglishenhou()) {
            echo( '功力不济, 江湖上历练几十年再领会破气式!' . PHP_EOL );
        } else {
            $this->poqiStyle();
        }
    }

    // 钩子方法
    protected function isGonglishenhou()
    {
        return true;
    }
}

class Fengqingyang extends Dugujiujian {
    protected $deepNeili = true;
    protected function zongjueStyle() {
        echo('风清杨在教 总决式' . PHP_EOL);
    }

    protected function pojianStyle() {
        echo('风清杨在教 破剑式' . PHP_EOL);
    }

    protected function podaoStyle() {
        echo('风清杨在教 破刀式' . PHP_EOL);
    }

    protected function pozhangStyle() {
        echo('风清杨在教 破掌式' . PHP_EOL);
    }

    protected function poqiStyle() {
        echo('风清杨在教 破气式' . PHP_EOL);
    }

    protected function isGonglishenhou () {
        return $this->deepNeili;
    }

    // 能不能教学破气式是由内力决定的
    public function checkGongli($deepNeili) {
        return $this->deepNeili = (bool) $deepNeili;
    }
}

class linghuchong extends Dugujiujian {
    protected function zongjueStyle()
    {
        echo('令狐冲在学 总决式' . PHP_EOL);
    }

    protected function pojianStyle()
    {
        echo('令狐冲在学 破剑式' . PHP_EOL);
    }

    protected function podaoStyle()
    {
        echo('令狐冲在学 破刀式' . PHP_EOL);
    }

    protected function pozhangStyle()
    {
        echo('令狐冲在学 破掌式' . PHP_EOL);
    }

    protected function poqiStyle()
    {
        echo('令狐冲在学 破气式' . PHP_EOL);
    }

    protected function isGonglishenhou()
    {
        return false;
    }
}

class chuanshouDugujiujian {
    public static function main ()
    {
        $fengqingyang = new Fengqingyang();
        $deepNeili = 1;
        if(!$deepNeili) {
            $fengqingyang->checkGongli($deepNeili);
        }
        $fengqingyang->useDujiujian();

        $deepNeili = 0;
        $linghuchong = new Linghuchong();
        $linghuchong->useDujiujian();
    }
}

chuanshouDugujiujian::main();

    // 风清杨在教 总决式
    // 风清杨在教 破剑式
    // 风清杨在教 破刀式
    // 风清杨在教 破掌式
    // 风清杨在教 破气式
    // 令狐冲在学 总决式
    // 令狐冲在学 破剑式
    // 令狐冲在学 破刀式
    // 令狐冲在学 破掌式
    // 功力不济, 江湖上历练几十年再领会破气式!
