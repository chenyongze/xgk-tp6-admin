#!/bin/bash

# 发布脚本
### 后端代码发布
###
PUSH_SSH='root@xgk-15'
PUSH_ONLINE_DIST='/app/xgk-api/'

echo $(date)
WORKDIR=$(
    cd $(dirname $0)
    pwd
)
echo -e "\033[32m 当前目： ${WORKDIR} \033[0m"
UP_WORKDIR=$(
    cd ${WORKDIR}/../
    pwd
)
echo -e "\033[32m up-path： ${UP_WORKDIR}\033[0m"
cd ${UP_WORKDIR}

DIST_PATH=${UP_WORKDIR}

EXCLUDE_FILE='--exclude runtime/
    --exclude ./.env 
    --exclude .git/ 
    --exclude ./bin/
    --exclude .DS_Store 
    --exclude composer.json 
    --exclude composer.lock 
    --exclude license 
    --exclude build.cmd 
    --exclude readme.md 
    --exclude .gitignore 
    --exclude .gitattributes 
    --exclude public/upload/'

# 发布代码
echo -e "\033[34m
执行同步命令：
rsync -avz ${DIST_PATH}/ ${EXCLUDE_FILE} ${PUSH_SSH}:${PUSH_ONLINE_DIST} 
\033[0m"

echo -e "\033[36m 同步代码开始..."
rsync -avz ${DIST_PATH}/ ${EXCLUDE_FILE} ${PUSH_SSH}:${PUSH_ONLINE_DIST}
echo -e "\033[0m"
# 更改环境

echo -e "\033[32m 环境切换-🍻...\033[0m"
ssh ${PUSH_SSH} "cd ${PUSH_ONLINE_DIST}; cp .env.online .env; chmod a+r .env;pwd ;chmod -R 777 ./runtime; echo $(date) "
