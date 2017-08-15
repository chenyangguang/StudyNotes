---
title: Emacs 漫步-- org-mode 二三事之 link
date: 2017-08-15 17:21:00
tags:
- Emacs
- 编辑器
---

## org-link

emacs 内使用 Alt + X 调起 helm 界面。 helm 界面可以在输入模式下直接调起。不像vim。 输入 org-link 可以看到各种有关 org-mode 下 link 相关的操作。helm 非常友好，只要输入相关关键字的命令名称，就给列出来所有包含这个关键字的命令了。而且输入这些关键字查询的时候, 可以不分次序!

org-mode 下的 link 是这样款式的 [[http://www.gnu.org/software/emacs/][GNU Emacs]], [http://wowubuntu.com/markdown/](markdown的链接方式), 大同小异。正常情况下 org-link 带有三个中括号，内部第一个中括号是链接地址，可以是文件路径，图片地址，http 超链接，第二个中括号是这个链接的描述，描述可以为空 如 [[http://www.gitvim.com]]。

列举几个常用的 link 操作: 

1. org-insert-link
顾名思义， 添加一个带有链接和描述的超链接文案, 先输入 link, 然后是 description。

2. org-toggle-link-display
可以切换 link 和 description 之间的显示, 方便修改描述和链接地址。 

3. org-store-link
用于...这个诡异

4. org-previous-link & org-next-link
双胞胎, 前后跳转到链接的命令。

 
## 小结
Emacs 这种程序国之重器, 思量之，适可而止。
