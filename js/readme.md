var a = b = 1; 相当于 var a = (b = 0); 会创建隐形全局变量。　a是局部变量，b是全局变量，　主要原因是从右至左的操作符优先级。
不如这样：
var a = 1,
    b = 1,
    c = 1;

js 可以多采用对象字面量

============================================================================
var obj = {
    name: 'auto',
    job: 'farmer',
    getName: function () {
        return this.name;
    }
};
    
//调用
obj.getName();

============================================================================
//更优雅写法
var obj;
(function () {
    var name = 'auto',
        job = 'former';
    obj = {
        getName: function() {
            return name;
        }
    }
 }());

============================================================================
var obj = {
    num = 0,
    add: function (arg) {
        this.num += arg;
        return this;
    },
    red function (arg) {
        this.num -= arg;
        return this;
    },
    setTotal: function () {
        console.log(this.num);
    }
};

obj.add(5).red(2).setTotal();

============================================================================
// 构造函数
function Obj() {
    if(!(this instanceof Obj)) {
        return new Obj();
    }

    this.name = 'auto';
    this.job = 'farmer';

    this.getName = function () {}
    console.log(this.name);
}

// 调用
var obj = new Obj();
obj.getName();

============================================================================
function Obj () {
    this.name = 'auto';
    this.age = 5;

    // 私有属性
    var address = 'shenzhen',
    that = this;

    // 私有方法　
    function getAddress() {
        console.log(that.address);
    }

    this.getName = function () {
        console.log(this.name);
    }
}

============================================================================
function Obj() {
    this.name = 'auto';
    this.age = 25;

    // 将指针赋给getName
    this.getName = getName;
}

function getName () {
    console.log(this.name);
}

var obj1 = new Obj();
var obj2 = new Obj();

====================================== 原型  ======================================
function Obj(){
    Obj.prototype.name = 'auto';
    Obj.prototye.age = 5;
    Obj.prototype.getName = function () {
        console.log(this.name);
    }
}

// 调用方式
var obj1 = new Obj();
obj1.getName();

var obj2 = new Obj();
obj2.getName();
console.log(obj1.getName == obj2.getName);


======================================   ======================================
fuction Obj() {
    Obj.prototype = {
        constructor: Obj,
        name: 'auto',
        age: 25,
        getName: function () {
            return this.name;
        }
    }
}

var obj = new Obj();
console.log(obj.constructor == Obj); // false


======================================   ======================================
function Obj() {
    if (! (this instanceof Obj)) {
        return new Obj();
    }

    this.name = 'auto';
    this.age = 30;
}

Obj.prototype = {
    constructor: Obj,
    getName: function () {
        return this.name;
    }
}

var obj = Obj();
obj.getName();


====================================== 模块模式  ======================================
var testModule = (function () {
    var testNode = document.getElementById('test');
    setHtml = function(txt) {
        testNode.innerHTML = txt;
    }

    return {
        setHtml; setHtml
    }
}())

