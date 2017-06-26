webpackJsonp([0],{65:function(e,t,a){function l(e){a(72)}var i=a(1)(a(67),a(73),l,null,null);e.exports=i.exports},67:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});a(68),a(70),a(69);t.default={data:function(){return{create:{topics:"",meeting_feature:"all",meeting_feature_option:[],meeting_level:"all",meeting_level_option:[],content:"",host:"",master:"",participant:[],site:"",meeting_time:""},participantVisible:!1,treeData:[],treeDataProps:{children:"children",label:"label"},transferData:[],pickerOptions:{shortcuts:[{text:"最近一周",onClick:function(e){var t=new Date,a=new Date;a.setTime(a.getTime()-6048e5),e.$emit("pick",[a,t])}},{text:"最近一个月",onClick:function(e){var t=new Date,a=new Date;a.setTime(a.getTime()-2592e6),e.$emit("pick",[a,t])}},{text:"最近三个月",onClick:function(e){var t=new Date,a=new Date;a.setTime(a.getTime()-7776e6),e.$emit("pick",[a,t])}}]}}},methods:{getTreeData:function(){var e=this;e.treeData&&axios.post("/getTreeData",{}).then(function(t){var a=t.data.treedata;e.treeData=a}).catch(function(e){console.log(e)}),e.participantVisible=!0},getEmployees:function(){var e=this;axios.post("/getEmployees",{}).then(function(t){for(var a=t.data.employees,l=[],i=0;i<a.length;i++)l.push({key:a[i].id,label:a[i].name});e.transferData=l}).catch(function(e){console.log(e)}),this.$message("sdasd")}},created:function(){var e=this;axios.post("/getTableCategory",{}).then(function(t){var a=t.data;e.create.meeting_feature_option=a.meeting_feature_option,e.create.meeting_level_option=a.meeting_level_option}).catch(function(e){console.log(e)})}}},68:function(e,t,a){"use strict";var l=a(16),i=a.n(l);i.a.mock("/getTableCategory",{meeting_level_option:[{label:"高级",meeting_level:"high"},{label:"中级",meeting_level:"middle"},{label:"普通",meeting_level:"common"},{label:"不限",meeting_level:"all"}],meeting_feature_option:[{label:"网络会议",meeting_feature:"net"},{label:"电话会议",meeting_feature:"phone"},{label:"普通会议",meeting_feature:"common"},{label:"不限",meeting_feature:"all"}]})},69:function(e,t,a){"use strict";var l=a(16),i=a.n(l);i.a.mock("/getEmployees",{"employees|2-10":[{id:"@id",name:"@cname"}]})},70:function(e,t,a){"use strict";var l=a(16),i=a.n(l);i.a.mock("/getTreeData",{treedata:[{id:1,label:"业务部",children:[{id:5,label:"销售部"},{id:6,label:"市场开发部"},{id:7,label:"售后服务部"}]},{id:2,label:"工程部",children:[{id:8,label:"设计部"}]},{id:3,label:"生产部",children:[{id:9,label:"物料部"},{id:10,label:"统计部"}]},{id:4,label:"管理部",children:[{id:11,label:"人力资源部"},{id:12,label:"总裁办"}]}]})},71:function(e,t,a){t=e.exports=a(64)(!0),t.push([e.i,".el-dialog{text-align:left}","",{version:3,sources:["/Users/nikejin/GitHub/meeting/src/components/home/createMeeting.vue"],names:[],mappings:"AACA,WACC,eAAgB,CAChB",file:"createMeeting.vue",sourcesContent:["\n.el-dialog{\n\ttext-align:left;\n}\n"],sourceRoot:""}])},72:function(e,t,a){var l=a(71);"string"==typeof l&&(l=[[e.i,l,""]]),l.locals&&(e.exports=l.locals);a(66)("e93b2c46",l,!0)},73:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticStyle:{"margin-left":"30px"}},[a("el-row",{attrs:{gutter:20}},[a("el-form",{model:{value:e.create,callback:function(t){e.create=t},expression:"create"}},[a("el-col",{attrs:{span:10}},[a("el-form-item",{attrs:{label:"会议主题"}},[a("el-input",{model:{value:e.create.topics,callback:function(t){e.create.topics=t},expression:"create.topics"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"会议级别"}},[a("el-select",{model:{value:e.create.meeting_level,callback:function(t){e.create.meeting_level=t},expression:"create.meeting_level"}},e._l(e.create.meeting_level_option,function(e){return a("el-option",{key:e.meeting_level,attrs:{label:e.label,value:e.meeting_level}})}))],1),e._v(" "),a("el-form-item",{attrs:{label:"会议性质"}},[a("el-select",{model:{value:e.create.meeting_feature,callback:function(t){e.create.meeting_feature=t},expression:"create.meeting_feature"}},e._l(e.create.meeting_feature_option,function(e){return a("el-option",{key:e.meeting_feature,attrs:{label:e.label,value:e.meeting_feature}})}))],1),e._v(" "),a("el-form-item",{attrs:{label:"文件上传"}},[a("el-upload",{attrs:{drag:"",action:"https://jsonplaceholder.typicode.com/posts/","file-list":e.create.fileList,multiple:""}},[a("i",{staticClass:"el-icon-upload"}),e._v(" "),a("div",{staticClass:"el-upload__text"},[e._v("将文件拖到此处，或"),a("em",[e._v("点击上传")])]),e._v(" "),a("div",{staticClass:"el-upload__tip",slot:"tip"},[e._v("只能上传jpg/png文件，且不超过500kb")])])],1),e._v(" "),a("el-form-item",{attrs:{label:"会议内容"}},[a("el-input",{attrs:{type:"textarea",autosize:{minRows:4,maxRows:8}},model:{value:e.create.content,callback:function(t){e.create.content=t},expression:"create.content"}})],1)],1),e._v(" "),a("el-col",{attrs:{span:10}},[a("el-form-item",{attrs:{label:"主办单位"}},[a("el-input",{model:{value:e.create.host,callback:function(t){e.create.host=t},expression:"create.host"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"主持人"}},[a("el-input",{model:{value:e.create.master,callback:function(t){e.create.master=t},expression:"create.master"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"参与人员"}},[a("el-col",{attrs:{span:17}}),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:e.getTreeData}},[e._v("选择")])],1),e._v(" "),a("el-dialog",{attrs:{title:"参与人员选择",visible:e.participantVisible,id:"dialog"},on:{"update:visible":function(t){e.participantVisible=t}}},[a("el-row",{attrs:{gutter:20}},[a("el-col",{attrs:{span:6}},[a("el-tree",{attrs:{data:e.treeData,props:e.treeDataProps,"highlight-current":"",indent:25},on:{"node-click":e.getEmployees}})],1),e._v(" "),a("el-col",{attrs:{span:18}},[a("el-transfer",{attrs:{data:e.transferData,titles:["可选人员","已选人员"],indent:25},model:{value:e.create.participant,callback:function(t){e.create.participant=t},expression:"create.participant"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",slot:"footer"},[a("el-button",{on:{click:function(t){e.participantVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){e.participantVisible=!1}}},[e._v("确 定")])],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"日期选项"}},[a("el-date-picker",{attrs:{type:"daterange",align:"right",placeholder:"选择日期范围","picker-options":e.pickerOptions},model:{value:e.create.meeting_time,callback:function(t){e.create.meeting_time=t},expression:"create.meeting_time"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"持续时间"}},[a("el-input",{model:{value:e.create.duration,callback:function(t){e.create.duration=t},expression:"create.duration"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"会议地点"}},[a("el-input",{attrs:{readonly:""},model:{value:e.create.site,callback:function(t){e.create.site=t},expression:"create.site"}})],1)],1)],1)],1)],1)},staticRenderFns:[]}}});
//# sourceMappingURL=0.ab68db32dc518f643ed5.js.map