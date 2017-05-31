# php 源码赏析 ~ 第一套广播体操(string 篇)

## 寻根究底
最近看到一些 php 的函数时，一直在想，它背后是怎么实现的呢？不仔细的挖一遍它的底细，压根就是经常会用错。而且感觉用的是一个黑箱子。指不定里面啥时候窜出一条蛇来。所以，找来源码，推敲一下底层的实现逻辑。
## 第一节: 伸展运动 [strpos](https://github.com/php/php-src/blob/master/ext/standard/string.c) 

它的整个实现风貌先展现出来， 长的是貌美如花: 

### strpos 源码

```
PHP_FUNCTION(strpos)
{
	zval *needle;
	zend_string *haystack;
	char *found = NULL;
	char  needle_char[2];
	zend_long  offset = 0;

	ZEND_PARSE_PARAMETERS_START(2, 3)
		Z_PARAM_STR(haystack)
		Z_PARAM_ZVAL(needle)
		Z_PARAM_OPTIONAL
		Z_PARAM_LONG(offset)
	ZEND_PARSE_PARAMETERS_END();

	if (offset < 0) {
		offset += (zend_long)ZSTR_LEN(haystack);
	}
	if (offset < 0 || (size_t)offset > ZSTR_LEN(haystack)) {
		php_error_docref(NULL, E_WARNING, "Offset not contained in string");
		RETURN_FALSE;
	}

	if (Z_TYPE_P(needle) == IS_STRING) {
		if (!Z_STRLEN_P(needle)) {
			php_error_docref(NULL, E_WARNING, "Empty needle");
			RETURN_FALSE;
		}

		found = (char*)php_memnstr(ZSTR_VAL(haystack) + offset,
			                Z_STRVAL_P(needle),
			                Z_STRLEN_P(needle),
			                ZSTR_VAL(haystack) + ZSTR_LEN(haystack));
	} else {
		if (php_needle_char(needle, needle_char) != SUCCESS) {
			RETURN_FALSE;
		}
		needle_char[1] = 0;

		found = (char*)php_memnstr(ZSTR_VAL(haystack) + offset,
							needle_char,
							1,
		                    ZSTR_VAL(haystack) + ZSTR_LEN(haystack));
	}

	if (found) {
		RETURN_LONG(found - ZSTR_VAL(haystack));
	} else {
		RETURN_FALSE;
	}
}
```

### 初探
咋看，果然没有让我失望, 有点蒙: 这都啥啥啥? 第一眼只看懂了 if, else。 没系统的学习过 c 语言，阅读起来真的很费眼力劲, 呵呵。
那就先过一遍: 

```
	zval *needle;
	zend_string *haystack;
	char *found = NULL;
	char  needle_char[2];
	zend_long  offset = 0;
```
这一堆，是定义了一些变量。

然后
```
	ZEND_PARSE_PARAMETERS_START(2, 3)
		Z_PARAM_STR(haystack)
		Z_PARAM_ZVAL(needle)
		Z_PARAM_OPTIONAL
		Z_PARAM_LONG(offset)
	ZEND_PARSE_PARAMETERS_END();
```
没看懂，应该是初始化参数, (2, 3)说明是这个 **strpos** 函数的参数在 2 - 3 个之间。

接着，进行至第三个参数 offset 的判断了。

```
	if (offset < 0) {
		offset += (zend_long)ZSTR_LEN(haystack);
	}
	if (offset < 0 || (size_t)offset > ZSTR_LEN(haystack)) {
		php_error_docref(NULL, E_WARNING, "Offset not contained in string");
		RETURN_FALSE;
	}
```

猜测当第三个参数 offset 是负数的时候，是反向的查找的。如果负数太小了，比如反向查找 'test' 中的 's' 来说， 就是 strpos('test', 't', -10), 就会报错了。 

```
➜  data.formaxoa.com git:(master) php -r "echo strpos('test', 's', -10);"
PHP Warning:  strpos(): Offset not contained in string in Command line code on line 1

Warning: strpos(): Offset not contained in string in Command line code on line 1
```

果然。

先不追究细节, 走着。

```
	if (Z_TYPE_P(needle) == IS_STRING) {
		if (!Z_STRLEN_P(needle)) {
			php_error_docref(NULL, E_WARNING, "Empty needle");
			RETURN_FALSE;
		}

		found = (char*)php_memnstr(ZSTR_VAL(haystack) + offset,
			                Z_STRVAL_P(needle),
			                Z_STRLEN_P(needle),
			                ZSTR_VAL(haystack) + ZSTR_LEN(haystack));
	} else {
		if (php_needle_char(needle, needle_char) != SUCCESS) {
			RETURN_FALSE;
		}
		needle_char[1] = 0;

		found = (char*)php_memnstr(ZSTR_VAL(haystack) + offset,
							needle_char,
							1,
		                    ZSTR_VAL(haystack) + ZSTR_LEN(haystack));
	}
```

一个 if(){} else{}, 哎呀，我滴亲娘啊，好像很简单啊，就判断一下要查找的参数 needle 是不是字符串类型, 然后如此如此, 最后返回一个 found。

而 found 最核心的就是一个真正查找这个字符的位置的函数 **php_memnstr**, 这个函数的实体实际是 **zend_memnstr** 这个函数。

继续追下去看看


```
static zend_always_inline const char *
zend_memnstr(const char *haystack, const char *needle, size_t needle_len, const char *end)
{
	const char *p = haystack;
	const char ne = needle[needle_len-1];
	ptrdiff_t off_p; 
	size_t off_s;

	if (needle_len == 1) {
		return (const char *)memchr(p, *needle, (end-p));
	}

	off_p = end - haystack;
	off_s = (off_p > 0) ? (size_t)off_p : 0;

	if (needle_len > off_s) {
		return NULL;
	}

	if (EXPECTED(off_s < 1024 || needle_len < 9)) {	/* glibc memchr is faster when needle is too short */
		end -= needle_len;

		while (p <= end) {
			if ((p = (const char *)memchr(p, *needle, (end-p+1))) && ne == p[needle_len-1]) {
				if (!memcmp(needle, p, needle_len-1)) {
					return p;
				}
			}

			if (p == NULL) {
				return NULL;
			}

			p++;
		}

		return NULL;
	} else {
		return zend_memnstr_ex(haystack, needle, needle_len, end);
	}
}
```

这里 zend_memnstr() , 接收四个传进来的参数。 这里可以看到， 当判断出查找的字符串很短，查找的区间也很短时，(为啥是off_s < 1024 或者 needle_len < 9 这两个阀值， 不得而知) 调用的是 glibc 库，这个库是 linux 最底层的 api, 否则就跑去调用 **zend_operators.h** 文件下面的 **ZEND_FASTCALL** 类型的 **zend_memnstr_ex**, 注释里说 glibc 更快。

ptrdiff_t  这个其实是一个 zend_long 在/intl/collator/collator_sort.c文件下面有这个定义。

```
#if !defined(HAVE_PTRDIFF_T) && !defined(_PTRDIFF_T_DEFINED)
typedef zend_long ptrdiff_t;
#endif
```

又跳去搞事情了

/ext/standard/file.c

```
#define FPUTCSV_FLD_CHK(c) memchr(ZSTR_VAL(field_str), c, ZSTR_LEN(field_str))

```


其他看不太明白。

在非字符串类型搜索分支判断里面，还进行了详细的判断。总之: 要搜索的字符应该是字符串或者数值类型。


```
static int php_needle_char(zval *needle, char *target)
{
	switch (Z_TYPE_P(needle)) {
		case IS_LONG:
			*target = (char)Z_LVAL_P(needle);
			return SUCCESS;
		case IS_NULL:
		case IS_FALSE:
			*target = '\0';
			return SUCCESS;
		case IS_TRUE:
			*target = '\1';
			return SUCCESS;
		case IS_DOUBLE:
			*target = (char)(int)Z_DVAL_P(needle);
			return SUCCESS;
		case IS_OBJECT:
			*target = (char) zval_get_long(needle);
			return SUCCESS;
		default:
			php_error_docref(NULL, E_WARNING, "needle is not a string or an integer");
			return FAILURE;
	}
}
```


然后就看到世界的尽头： 

```
	if (found) {
		RETURN_LONG(found - ZSTR_VAL(haystack));
	} else {
		RETURN_FALSE;
	}
```

找到了, 就返回一个位置，没找到就返回 FALSE 了。
伸展运动就做完了。
现在回过头来看，好像没那么简单。好多个宏不知道是干啥用的， 还有几个方法。

### 细究
第一个需要搞明白的是 ZSTR_LEN(haystack) 这个宏是干啥用的。  在 zend_string.h 中找到了它的定义： 

```c
#define ZSTR_VAL(zstr)  (zstr)->val
#define ZSTR_LEN(zstr)  (zstr)->len
#define ZSTR_H(zstr)    (zstr)->h
#define ZSTR_HASH(zstr) zend_string_hash_val(zstr)
```

这个解释在一篇 PHP 字符扩展的[文章](https://juejin.im/entry/583e8f36ac502e006c3605ee)里面有写道：
" **ZSTR_** 开头的宏方法是 **zend_string** 结构专属的方法 **ZSTR_VAL**, **ZSTR_LEN**, **ZSTR_H** 宏方法分别对应 ** zend_string** 结构的成员。
**ZSTR_HASH** 是获取字符串的hash值，如果不存在，就调用 hash 函数生成一个"。

 
## strpos 的实现思路

## 小结
头疼
## 有木有启发?
木有，感觉 底层写的很难懂。因为中间总是卡住。各种宏定义, 各种指针子子孙孙无穷尽也。




