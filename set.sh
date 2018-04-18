#!/usr/bin/bash
# git工作流程
git config --global user.name "许磊"
git config --global user.email "373045134@qq.com"

git clone XXXXXXXXXXX

cd XXXXXXX

touch README.md
git add README.md
git commit -m "add README"
git push -u origin master

#初始化仓库
git init
git remote add origin https://github.com/xulei131401/holy-DesignModel.git
git add .
git commit
git push -u origin master

#如果仓库中已经有了三个分支，则直接进行下边的操作
#git checkout -b develop origin/develop
#git checkout -b test origin/test
#否则
git branch develop
git checkout develop
git push -u origin develop

git branch test
git checkout test
git push -u origin test

#关联第三方仓库
git remote add upstream https://github.com/xulei131401/holy-DesignModel.git
git remote update upstream

git branch -a

#提交代码流程
git checkout develop
git remote update upstream
git pull upstream develop

git add XXXX
git commit -m "xxxx"
git push