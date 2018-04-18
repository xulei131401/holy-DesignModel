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


git init
git remote add origin https://github.com/xulei131401/holy-DesignModel.git
git add .
git commit
git push -u origin master


git checkout -b develop origin/develop
git checkout -b test origin/test


git remote add upstream https://github.com/xulei131401/holy-DesignModel.git
git remote update upstream

git branch -a


git checkout develop
git remote update upstream
git pull upstream develop

git add XXXX
git commit -m "xxxx"
git push