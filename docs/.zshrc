export GOROOT="/usr/local/go"
export GOPATH="/home/v/gowork"
export GOBIN="/home/v/gowork/bin"
export PATH="$PATH:/usr/local/go/bin"

export PATH="$PATH:$PATH:$GOROOT/bin:/home/v/gowork/bin:$GOPATH/bin"


export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"  # This loads nvm bash_completion



# -------------- tmux  配置  start---------------------
tmux_init()
{
    tmux new-session -s "kumu" -d -n "local"    # 开启一个会话
    tmux new-window -n "other"          # 开启一个窗口
    tmux split-window -h                # 开启一个竖屏
    tmux split-window -v "top"          # 开启一个横屏,并执行top命令
    tmux -2 attach-session -d           # tmux -2强制启用256color，连接已开启的tmux
}

# 判断是否已有开启的tmux会话，没有则开启
if which tmux 2>&1 >/dev/null; then
    test -z "$TMUX" && (tmux attach || tmux_init)
fi
# -------------- tmux  配置  end---------------------
