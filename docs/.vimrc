set nocompatible

execute pathogen#infect()
syntax on
filetype on
filetype plugin indent on

set encoding=utf-8
scriptencoding=utf-8
set nobomb
"set fileformats=unix,mac,dos


set cc=80 "columns
set ts=4
set expandtab

" 80 column show
highlight OverLength ctermbg=red ctermfg=white guibg=#592929
match OverLength /\%81v.\+/

"set background=dark
if has('gui_running')
    set background=light
else
    set background=dark
endif
let g:solarized_use16 = 0
let g:solarized_termcolors=256
colorscheme solarized

set autochdir
set autoindent
set nu

set hlsearch

set foldenable
set foldmethod=syntax
set mouse=a

"NERDTree
nmap <F3> :NERDTreeToggle<CR>

"autocmd vimenter * NERDTree


"php-cs-fixer 
" If php-cs-fixer is in $PATH, you don't need to define line below
" let g:php_cs_fixer_path = "~/php-cs-fixer.phar" " define the path to the php-cs-fixer.phar

" If you use php-cs-fixer version 1.x
"let g:php_cs_fixer_level = "symfony"                   " options: --level (default:symfony)
"let g:php_cs_fixer_config = "default"                  " options: --config
" If you want to define specific fixers:
"let g:php_cs_fixer_fixers_list = "linefeed,short_tag" " options: --fixers
"let g:php_cs_fixer_config_file = '.php_cs'            " options: --config-file
" End of php-cs-fixer version 1 config params

" If you use php-cs-fixer version 2.x
let g:php_cs_fixer_rules = "@PSR4"          " options: --rules (default:@PSR2)
"let g:php_cs_fixer_cache = ".php_cs.cache" " options: --cache-file
"let g:php_cs_fixer_config_file = '.php_cs' " options: --config
" End of php-cs-fixer version 2 config params

"let g:php_cs_fixer_php_path = "php"               " Path to PHP
"let g:php_cs_fixer_enable_default_mapping = 1     " Enable the mapping by default (<leader>pcd)
"let g:php_cs_fixer_dry_run = 0                    " Call command with dry-run option
"let g:php_cs_fixer_verbose = 0       
"


nmap <F8> :TagbarToggle<CR>

"ctrp
set runtimepath^=~/.vim/bundle/ctrlp.vim
let g:ctrlp_map = '<c-p>'
let g:ctrlp_cmd = 'CtrlP'
let g:ctrlp_working_path_mode = 'ra'
set wildignore+=*/tmp/*,*.so,*.swp,*.zip     " MacOSX/Linux
"set wildignore+=*\\tmp\\*,*.swp,*.zip,*.exe  " Windows

let g:ctrlp_custom_ignore = '\v[\/]\.(git|hg|svn)$'
"let g:ctrlp_custom_ignore = {
"  \ 'dir':  '\v[\/]\.(git|hg|svn)$',
"  \ 'file': '\v\.(exe|so|dll)$',
"  \ 'link': 'some_bad_symbolic_links',
"  \ }
let g:ctrlp_user_command = 'find %s -type f'        " MacOSX/Linux
"let g:ctrlp_user_command = 'dir %s /-n /b /s /a-d'  " Windows  



" ctags + tagslist
"let g:tagbar_ctags_bin = '/c/Users/Administrator/Downloads/emacs-25.2-x86_64/bin/ctags'

