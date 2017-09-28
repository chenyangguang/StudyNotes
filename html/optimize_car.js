require([
    'jquery',
], function(){

    // 原生 js 实现
    //左侧滚动固定导航
    this.navScrollLeft = function () {
        var that = this, timer,
            obj = wd.dom.id('navScrollLeft'),
            obj_link = obj.getElementsByTagName('a'),
            oMain = wd.dom.id('content'),
            top = 155,
            isIE6 = wd.browsers.isIE6,
            set = function () {
                var pos = wd.abs.point(oMain),
                    bpos = wd.abs.point(wd.dom.id(that.Data.navMeto.item[0].id)),
                    sT = wd.abs.scroll(),
                    style = obj.style,
                    metoList = [];

                if (sT.top > bpos.y - top) {
                    style.cssText = 'display:block;position:' + (isIE6 ? 'absolute' : 'fixed') + ';top:' + (isIE6 ? sT.top + top : top) + 'px;left:' + (pos.x - 132 - (isIE6 ? 5 : sT.left)) + 'px';
                }
                else {
                    style.cssText = 'display:block;position:absolute;top:' + bpos.y + 'px;left:' + (pos.x - 132 - (isIE6 ? 5 : 0)) + 'px';
                }

                for (var i = 0, len = that.Data.navMeto.item.length; i < len; i++) {
                    metoList.push({ dom: wd.dom.id(that.Data.navMeto.item[i].id), index: i });
                }

                for (var i = 0, len = metoList.length; i < len; i++) {
                    var h = wd.abs.point(metoList[i].dom).y + wd.dom.id(metoList[i].dom.getAttribute('pid')).offsetHeight - 35 - (top + i * 27);
                    if (h > sT.top) {
                        for (var j = 0, l = obj_link.length; j < l; j++) obj_link[j].className = '';
                        obj_link[i].className = 'active';
                        break;
                    }
                }
            };

    };

    // jquery 实现汽车之家的滑动效果思路
    $(window).on("scroll",function(){
        var w_sroll = $(this).scrollTop();
        if((w_sroll-room_h)<-80){
            $(".room-menu-btn").removeClass("fixed");
            $(".room-menu").removeClass("fixed");
        }else{
            $(".room-menu-btn").addClass("fixed");
            $(".room-menu").addClass("fixed");

            if(w_w > 1199) {
                var
                    tables = $('.showParameter').find('table'),
                    lis = $('.room-detail').find('.room-menu-ul li'),
                    father_h = 110,
                    step_h = 37,
                    th_h = 56;

                for (var i = 0, l = tables.length; i < l; i++) {
                    var h = $(tables[i]).offset().top + $(tables[i]).height() - th_h - (father_h + i * step_h);
                    if(h > w_sroll) {
                        lis.eq(i).addClass('active').siblings().removeClass('active');
                        tales.eq(i).addClass('on').siblings().removeClass('on');
                        break;
                    }
                }
            }
        }
    });
});
