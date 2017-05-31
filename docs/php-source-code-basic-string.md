# php 源码半日游 
## zend 基础类型- 宏

zend 底层有相当多的宏, 特别是 php7 系列, 源码比 php 5 有不少结构方面的改变。所以不去研究 php5 的 zend 了, 直接往后研究的源码都主要看最新的 **php-src**。 zend 系列的宏主要分布在 zend_API.h, zend_types.h, zend_operators.h 里面。

```
typedef struct _zend_object_handlers zend_object_handlers;
typedef struct _zend_class_entry     zend_class_entry;
typedef union  _zend_function        zend_function;
typedef struct _zend_execute_data    zend_execute_data;

typedef struct _zval_struct     zval;

typedef struct _zend_refcounted zend_refcounted;
typedef struct _zend_string     zend_string;
typedef struct _zend_array      zend_array;
typedef struct _zend_object     zend_object;
typedef struct _zend_resource   zend_resource;
typedef struct _zend_reference  zend_reference;
typedef struct _zend_ast_ref    zend_ast_ref;
typedef struct _zend_ast        zend_ast;
```

放眼望去，似曾相识燕归来！ 

### zval 
zval 不就是大名鼎鼎的 php 变量容器么！源码内使用频率相当高。一搜 php-src，超过 9999 次现身!
可想而知， zval 肯定是灰常重要的。 
解开这个结构体，发现是这个模样:

```
struct _zval_struct {
	zend_value        value;			/* value */
	union {
		struct {
			ZEND_ENDIAN_LOHI_4(
				zend_uchar    type,			/* active type */
				zend_uchar    type_flags,
				zend_uchar    const_flags,
				zend_uchar    reserved)	    /* call info for EX(This) */
		} v;
		uint32_t type_info;
	} u1;
	union {
		uint32_t     next;                 /* hash collision chain */
		uint32_t     cache_slot;           /* literal cache slot */
		uint32_t     lineno;               /* line number (for ast nodes) */
		uint32_t     num_args;             /* arguments number for EX(This) */
		uint32_t     fe_pos;               /* foreach position */
		uint32_t     fe_iter_idx;          /* foreach iterator index */
		uint32_t     access_flags;         /* class constant access flags */
		uint32_t     property_guard;       /* single property guard */
		uint32_t     extra;                /* not further specified */
	} u2;
};
```

分为三个部分， zend_value, u1, u2 三个联合体。
跟踪 zend_value 看看, 

```
typedef union _zend_value {
	zend_long         lval;				/* long value */
	double            dval;				/* double value */
	zend_refcounted  *counted;
	zend_string      *str;
	zend_array       *arr;
	zend_object      *obj;
	zend_resource    *res;
	zend_reference   *ref;
	zend_ast_ref     *ast;
	zval             *zv;
	void             *ptr;
	zend_class_entry *ce;
	zend_function    *func;
	struct {
		uint32_t w1;
		uint32_t w2;
	} ww;
} zend_value;
```

跋山涉水， zend_value 这个联合体可以存放所有可能的 php 数据类型数据。 数值分: 长整型或者双精度浮点型。 剩下的基本是指针值。有计数器指针，字符串指针，数组指针，对象指针，资源指针，引用指针, 空指针， 类指针，函数指针。 

而 u1 里面又是啥东东？ ZEND_ENDIAN_LOHI_4()这个东西, 

```
#ifdef WORDS_BIGENDIAN
# define ZEND_ENDIAN_LOHI(lo, hi)          hi; lo;
# define ZEND_ENDIAN_LOHI_3(lo, mi, hi)    hi; mi; lo;
# define ZEND_ENDIAN_LOHI_4(a, b, c, d)    d; c; b; a;
# define ZEND_ENDIAN_LOHI_C(lo, hi)        hi, lo
# define ZEND_ENDIAN_LOHI_C_3(lo, mi, hi)  hi, mi, lo,
# define ZEND_ENDIAN_LOHI_C_4(a, b, c, d)  d, c, b, a
#else
# define ZEND_ENDIAN_LOHI(lo, hi)          lo; hi;
# define ZEND_ENDIAN_LOHI_3(lo, mi, hi)    lo; mi; hi;
# define ZEND_ENDIAN_LOHI_4(a, b, c, d)    a; b; c; d;
# define ZEND_ENDIAN_LOHI_C(lo, hi)        lo, hi
# define ZEND_ENDIAN_LOHI_C_3(lo, mi, hi)  lo, mi, hi,
# define ZEND_ENDIAN_LOHI_C_4(a, b, c, d)  a, b, c, d
#endif
```

这些 哆瑞咪发嗦啦奇多, 暂时不知道做什么。不过 type, type_flags, const_flags, reserved 按照字面意思应该包含激活的类型，类型标志，常量标记，保留值。所以 u1 其实是存的类型相关的信息值。

u2 里面是存放一个额外的数据, 有介绍说是一般情况下用不到？这个[博客](http://nikic.github.io/)说的。



这里面有几个疑问仍未确定: 
1. zend_ast_ref 是类型数据？ 
2. 又有一个 zval! 这个是为什么？ 这个效果是不是这样： 我这个值里面还可以放任何类型的数据！php 就是这样实现存放数据的么？
3. php 官方文档给出的是基本类型是 Boolean 布尔类型， Integer整型，Float 浮点型，String 字符串，Array 数组，Object 对象，Resource 资源类型，NULL, CallBack/Callable类型。
4. ww 这个结构体是干啥用的？莫非是存放 CallBack/Callable 类型的数据？


## 小结 
PHP 底层没有看起来的那么简单。有些构造可能是巧妙的，但是目前还领会不到。
