Memcache是什么
memcache可以理解成只有两个字段的数据表,  

	key			varchar(255) utf8_general_ci
	value       text         utf8_general_ci

使用场景
	1. 非持久化存储:对数据存储要求不高
    2. 分布式存储: 不适合单机使用
	3. Key/Value存储:格式简单,不支持List, Array的数据格式

安装: 1. 编译安装Libevent Memcache
	  2. yum , apt-get
	  3. PS: Memcache, Memcached的区别, Memcached更强大



PHP中使用Memcache
	系统类: addServer, addServers, getStats, getVersion
	数据类: add, set, delete,flush, replace, increment, get
	进阶类: setMulti, deleteMulti, getMulti, getResultCode, getResultMesage
