# 会议管理系统 MeetingSystem
###### 项目是结合vue.js以及PHP、Laravel5.3框架、mysql写成的。

前端是vue.js结合elementUI,axios完成。由npm编译成静态文件。  
后台是由PHP、Laravel5.3结合MySQL完成。实现前后端分离。

---
[点击查看前端项目](https://github.com/a365893296/meeting)

---

 
### 目前本系统实现的功能 
* 用户的登录注册   
* 会议的查询
  - 条件查询
  - 模糊查询
  - 利用element UI的datatable和axios结合实现分页
* 添加会议
  - 添加会议时能根据选取时间查询出空的会议室
  - 添加会议时能根据部门选择参与会议人员

### 项目结构

```
└── Meeting    
    ├── AuthController.php     //只负责用户登录注册验证等    
    ├── DeptController.php     //返回所有部门  
    ├── MeetingController.php     //查询、添加会议  
    ├── RoomController.php     //返回会议室信息  
    └── UserController.php     //返回用户信息  

```

### 项目截图
查询会议截图：
![查询会议](http://ovi099wlz.bkt.clouddn.com/meetingSystem1.jpg "查询会议截图")
添加会议截图：
![添加会议](http://ovi099wlz.bkt.clouddn.com/meetingSystem2.png "添加会议截图")

## 项目总结
本项目是我对vue.js以及Laravel框架的一次探索。在实践中发现了很多看文档时遇不到以及忽略的问题，然后通过努力解决了。本次实践加深了我对vue.js以及Laravel框架的理解。


