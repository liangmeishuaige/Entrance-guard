<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>实验室</title>
<link rel="stylesheet" href="css/1.css">

<script src="js/jquery.min.js"> </script>
<script src="js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen">
<script type="text/javascript"> $('.picture').fancybox();</script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<style >
 #newslist{
padding:1px;height:20px;line-height:30px;
}
#contain{
font-size:25px;overflow:hidden;list-style:none;height:30px;margin:0px;padding:0;
}
#contain li{
height:30px;line-height:22px;white-space:nowrap;overflow:hidden;
}
 
    *{margin: 0 auto;}
        #ban{position:relative;}
        #ban .pic{margin: 0 auto;posion:absolute;left:0px;top:0px;}
        #ban .pic ul li{width:1900px;height:680px;list-style:none;position:absolute;display:none;left:0px;}
        #ban .tab{width:200px;height:10px;position:absolute;bottom:25px;right:25px; top:600px;}
        #ban .tab ul li{list-style:none;width:6px;height:6px;background:#111;border:2px solid #666;
            cursor:pointer;border-radius:50%;float:left;margin:0 5px;}
        #ban .tab .on{background:#e5e5e5;}
        #ban .tab ul li:hover{background:#e5e5e5;}
        
        #ban .btnx a{position:absolute;width:40px;height:70px;background:rgba(0,0,0,0);color:#fff;font-size:40px;
                text-align:center;line-height:70px;top:50%;margin-top:500px;text-decoration:none;
        }
        #left{left:0px;}
        #right{right:0px;}
        #ban .btnx a:hover{background:rgba(0,0,0,0.5);cursor:pointer;}





#testimonials{
background-color:orange;
}

.daohang{
color:white;
}
a:link {text-decoration:none;}   
a:visited {text-decoration:none;} 
a:hover {text-decoration:underline; color:red;}  
a:active {text-decoration:underline;}  /* selected link */

.picture{
    float:block;
	width:440px;
	height:360px;
	margin: 0 auto;;
	align:center;
}


.teacher{

display:inline;
margin:20px auto;
float:left;
height:auto;
}


.btn
{
background-color:white;
}
.btn:hover.btn
{
background-color:red;
}
.btn:active.btn
{
background-color:black;
}

#header.fixed {
	background-color: #383838; opacity:1;
}
#header{
background-color:#888888 ; opacity:1;
width:100%;top:0px;position:fixed;z-index:1;
}
 
.aaaa{
text.align:center;
color:red;
font-size:30px
}
</style>

<script>$(window).on('scroll', function() {
	var scroll = $(window).scrollTop();

	if (scroll >= 110) {
		$('#header').addClass('fixed');
	} else {
		$('#header').removeClass('fixed');
	}
});
</script>




<script >
function quote1()
{
	
	document.getElementById("contain").innerHTML="过放荡不羁的生活，容易得像顺水推舟，但是要结识良朋益友，却难如登天。——巴尔扎克";	
}
function quote2()
{
	
	document.getElementById("contain").innerHTML="如果你浪费了自己的年龄，那是挺可悲的。因为你的青春只能持续一点儿时间——很短的一点儿时间。——王尔德" ;	
}
function quote3()
{
	document.getElementById("contain").innerHTML="我读的书愈多，就愈亲近世界，愈明了生活的意义，愈觉得生活的重要，——高尔基" ;	
}
function quote4()
{
	document.getElementById("contain").innerHTML="人生并不像火车要通过每个站似的经过每一个生活阶段。人生总是直向前行走，从不留下什么。——刘易斯";	
}

</script>
</head>

<script type="text/javascript">
		$(document).ready(function(){
			$('.pic').DrSlider({
				'transition': 'fade',
				showNavigation: false,
				progressColor: "#9F1F22"
			});
		});
	</script>



<body>
<!-- 首页 -->

<section >
<br><br><br><br><br><br><br><br><br><br>


<div style="text-align:center">

<p class="aaaa">
请先登录以进行操作</p>



<iframe name="formsubmit" style="display:none;">    
</iframe>
<div>
  <div class=text-center>
 <a href="javascript:void(0)" class="btn btn-default button-style ex1" onclick="showBox()">更改用户</a></div>

 <div class="event" id="login_box" style="display: none;" target="formsubmit">
		<div class="login">
			<div class="title">
				<span class="t_txt">普通用户登录</span>
				<span class="del" onClick="deleteLogin()">X</span>
			</div>
			<form action="check.php" method="post">
				<input type="text" name="userNames" id="" value="" placeholder="请输入用户名"/>
				<input type="password" name="passwords" id="" value="" placeholder="请输入密码"/>
				
<p>验证码图片:<img src="images/code.php" onClick="this.src='images/code.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>点击图片可更换验证码</p>
    <p>请输入图片中的内容:<input type="text" name="captcha" value=""/></p>

				<input type="submit"value="登录" class="btn5" /></form>	<br>
				<div class="text-center">
				<a href="javascript:void(0)" style="color:black" onclick="showBox1()">没有账号？ 马上注册</a><br>
				<a href="javascript:void(0)" style="color:black" onclick="showBox2()" font-size:15px>管理员登录入口</a>
				</div>
				</div>
				</div>
				
				
				
				
				
				<div class="event" id="login_box2" style="display: none;" target="formsubmit">
		<div class="login">
			<div class="title">
				<span class="t_txt">管理员登录</span>
				<span class="del" onClick="deleteLogin2()">X</span>
			</div>
			<form action="check2.php" method="post">
				<input type="text" name="managerName" id="" value="" placeholder="请输入管理员号码"/>
				<input type="password" name="managerpassword" id="" value="" placeholder="请输入管理员密码"/>
				
<p>验证码图片:<img src="images/code.php" onClick="this.src='images/code.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>点击图片可更换验证码</p>
    <p>请输入图片中的内容:<input type="text" name="captcha" value=""/></p>

				<input type="submit"value="登录" class="btn5" /></form>	<br>
				<div class="text-center">
				
				<a href="javascript:void(0)" style="color:black;font-size:10px" onclick="showBox4()" font-size:15px>普通用户登录入口</a>
				</div>
				</div>
				</div>
				
				
				
				
		<div class="event" id="login_box1" style="display: none;" target="formsubmit">
		<div class="login">
			<div class="title">
				<span class="t_txt">注册</span>
				<span class="del" onClick="deleteLogin1()">X</span>
			</div>
			<form action="register.php" method="post">
				<input type="text" name="userName" id="" value="" placeholder="请输入用户名"/>
				<input type="password" name="password" id="" value="" placeholder="请输入密码"/>
				<input type="password" name="confirmPassword" id="" value="" placeholder="请再次输入密码"/>
				<input type="submit"   value="注册" class="btn5" />
			</form>	
		</div>
			
		</div>
	
<div class="bg_color" onClick="deleteLogin()" id="bg_filter" style="display: none;">
</div></div>

<script>
function showBox(){
	var show=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
	
};
	function showBox1(){
	var del=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
	var show=document.getElementById("login_box1");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
};

function showBox2(){
	var del=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
	var show=document.getElementById("login_box2");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
};
function showBox4(){
	var del=document.getElementById("login_box2");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
	var show=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	show.style.display="block";
	bg_filter.style.display="block";
};


function deleteLogin(){
	var del=document.getElementById("login_box");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
};
function deleteLogin1(){
	var del=document.getElementById("login_box1");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
};

function deleteLogin2(){
	var del=document.getElementById("login_box2");
	var bg_filter=document.getElementById("bg_filter");
	bg_filter.style.display="none";
	del.style.display="none";
};

</script>


<form  method="post"  action="qiandao.php" target="formsubmit">  
<input type="submit"  name="submit"  value="签到" /> 
</form>

<form   action="zhuxiao.php" target="formsubmit">  
<input type="submit"  name="submit"  value="注销" /> 
</form>

</div>


	<header id="header">
		<div >
			<h1 style="font-size:200%"><a href=index.html">移动互联网实验室-软件服务外包竞赛基地</a></h1> 
			
			</div>
				<nav >
					<ul style="float:right">
						<li ><a  class="daohang"href="#ban">首页</a> 
        				<a class="daohang" href="#services">实验室介绍</a>
       					<a class="daohang"href="#content">关于我们</a>
          				<a class="daohang"href="#gallery">展示</a>
        			    <a class="daohang"href="#teams">指导老师</a>
                        <a class="daohang"href="#testimonials">准则</a>
       				    <a class="daohang"href="#contact">联系我们&nbsp&nbsp</a></li>						
					</ul>						
				</nav>		
		</div>	<hr>
	</header>	
	<br><br><br><br><br>
	
 <div id="ban">
 
        <div class="pic">
            <ul>
                <li style="display:block"><a href="#"><img src="images/liangda.jpg" alt="" title=""  width="1900" height="680"/></a></li>
                <li><a href="#"><img src="images/shiyanshi.jpg" alt="" title="" width="1900" height="680"/></a></li>
                <li><a href="#"><img src="images/wai.jpg" alt="" title=""  width="1900" height="680"/></a></li>
                <li><a href="#"><img src="images/wai2.jpg" alt="" title=""  width="1900" height="680"/></a></li>
                <li><a href="#"><img src="images/wai3.jpg" alt="" title="" width="1900" height="680"/></a></li>
            </ul>
            </div>
            <div class="tab">
             <ul>
                 <li class="on"></li>
                 <li></li>
                 <li></li>
                 <li></li>
                 <li></li>
             </ul>  
        </div>
        
    
        <div class="btnx">
        <a id="left" href="javascript:void(0);" >&lt;</a>
        <a id="right" href="javascript:void(0);">&gt;</a>
        </div>
    
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script>
        var oBtnx=getClass("btnx");
        var oPicLi=getClass("pic")[0].getElementsByTagName("li");//获取div中的li标签
        var oTabLi=getClass("tab")[0].getElementsByTagName("li");//获取div中的li标签
        var oBtnxA=oBtnx[0].getElementsByTagName("a");//获取div中的a标签对象
        var index=0;
        for(var i=0;i<oTabLi.length;i++){//根据点击的tab去切换图片
            oTabLi[i].index=i;//这个地方需要注意，点击的tab要和图片index保持一致
            oTabLi[i].onclick=function(){//tab按钮点击事件
                index=this.index;
                for(var j=0;j<oTabLi.length;j++){//消除class样式
                    oTabLi[j].className="none";
                    //oPicLi[j].style.display="none";
                    if(j!=index){
                        fadeOut(oPicLi[j],1000);
                    }
                }
                this.className="on";//oTabLi[index].className="on";
                //oPicLi[index].style.display="block";
                fadeIn(oPicLi[index],1000);
            };
        }
        for(var i=0;i<oBtnxA.length;i++){
            oBtnxA[i].onclick=function(){//左右耳朵的点击事件
                if(this.id=="right"){//右耳朵点击事件
                    index++;
                    //oPicLi[(index-1)%5].style.display="none";
                    fadeOut(oPicLi[(index-1)%5],1000);
                    oTabLi[(index-1)%5].className="none";
                    oTabLi[index%5].className="on";
                    //oPicLi[index%5].style.display="block";
                    fadeIn(oPicLi[index%5],1000);
                }else {//左耳朵点击事件
                    if(index==0)index=5;
                    index--;
                    //oPicLi[(index+1)%5].style.display="none";
                    fadeOut(oPicLi[(index+1)%5],1000);
                    oTabLi[(index+1)%5].className="none";
                    oTabLi[index%5].className="on";
                    //oPicLi[index%5].style.display="block";
                    fadeIn(oPicLi[index%5],1000);
                }
            };
        }
        function fadeIn(obj,time){//淡入函数  实现time毫秒后显示，原理是根据透明度来完成的
            var startTime=new Date(); 
            obj.style.opacity=0;//设置下初始值透明度
            obj.style.display="block";
            var timer=setInterval(function(){
                var nowTime=new Date();
                var prop=(nowTime-startTime)/time;
                if(prop>=1){
                    prop=1;//设置最终系数值
                    clearInterval(timer);
                }
                obj.style.opacity=prop;//透明度公式： 初始值+系数*（结束值-初始值）
            },13);//每隔13ms执行一次function函数
        };
        
        function fadeOut(obj,time){
            var startTime=new Date(); 
            obj.style.opacity=1;//设置下初始值透明度
            obj.style.display="block";
            var timer=setInterval(function(){
                var nowTime=new Date();
                var prop=(nowTime-startTime)/time;
                if(prop>=1){
                    prop=1;//设置最终系数值
                    clearInterval(timer);
                }
                obj.style.opacity=1+prop*(0-1);//透明度公式： 初始值+系数*（结束值-初始值）
            },13);//每隔13ms执行一次function函数
        };
        
        function getClass(cName){//获取页面中所有class为cName的div对象
            if(document.getElementsByClassName){//如果浏览器支持这样获取一个class
                return document.getElementsByClassName(cName);
            }else {//如果浏览器不支持上述访问
                var allE=document.getElementsByTagName("*");//获取页面中所有的dom对象
                var reg=new RegExp("\\b"+cName+"\\b");
                var arr=[];
                for(var i=0;i<allE.length;i++){
                    if(reg.test(allE[i].className)){//如果匹配
                        arr.push(allE[i]);
                    }
                }
                return arr;//返回匹配的所有div对象，因为class不唯一，所以可能会返回多个div
            }
        };
    </script>


<div >
  <div  >
    <div  style="background-color:#ff7575;position:relative;" >
      <h1 style="text-align:center"><br>PC端和移动端的web设计<br></h1>
      <p style="text-align:center"><br>在这里,可以设计出精美的网页和酷炫的手机app,做自己喜欢的编程<br><br>-MR Yao<br></p>
    </div>
  </div>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- 实验室介绍 -->
<section id="services" class="services service-section">
<br><br><br><br><br><br><br><br>
  <div class="container">
  <div class="section-header">
                <h2  style="text-align:center" class="wow fadeInDown animated">我们的实验室</h2>
                <p  style="text-align:center" class="wow fadeInDown animated">致力于提升自己的编程技能 <br> 最终走向技术改变世界的道路</p>
            </div>
    <p style="text-align:center"><img src="images/intro.png"></p>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br>

<!-- 关于我们 -->
<section id="content">
<br><br><br><br><br><br><br><br><br>
<div  ><div class="col-md-8 col-sm-6">
<div style="float:left;"><img src="images/livingroom.jpg" /></div></div>
<div class="col-md-4 col-sm-6">
	<div style="float:right" style="font-size: 2rem; sans-serif">
		
		
					<h3 id="content">关于我们的实验室</h3>
					
				<div >
					<p >实验室以web开发为主要方向。目前方向包括：pc端界面构建、app端界面设计以及代码实现。</p>
					<p>实验室在省级竞赛中获得较不错的成绩，省一等奖拿到过多次，实验室对算法也有涉及，设计推荐系统的算法，等等。</p>
				</div>
				<a href="#gallery" class="btn btn-outline btn-outline outline-dark" style="text-decoration:underline">荣誉展示</a>
				</div>
	</div>
</div>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<blockquote style="text-align:center">
<div class="col-md-8 col-sm-6">
  <h1 style="font-size: 2rem; sans-serif">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp实验室宗旨</h1>
  <p1 style="font-size: 2rem;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">我们是一群爱好编程的小伙伴,致力于解决实际项目问题,达<br>
 到IT公司的项目要求。<br>
  我们的宗旨是从实际问题出发,展开问题的解决思路,每一步<br>
确定合适的技术栈,最后在合并,制造出来最后的产品。<br>
 从实际问题出发，用问题驱动来进行学习，搜索资源，编写代码。  </p1>
  </div>
</blockquote>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- 奖状展示 -->

<section id="gallery">
<br><br><br><br><br><br><br>
<h1 style="text-align:center">实验室展示</h1>
<p style="text-align:center">这里是我们的实验室点滴记录</p>
<p style="text-align:center">里面有我们的荣誉</p>
</section>

<section >
<a href="images/奖状2.jpg" class="picture"><img   src="images/奖状2.jpg" width="460" height="340" onmouseover='src="images/奖状1x.jpg"' onmouseout='src="images/奖状2.jpg"'/></a>
<a href="images/奖状2.jpg" class="picture"><img   src="images/奖状2.jpg" width="460" height="340"  onmouseover='src="images/奖状2x.jpg"' onmouseout='src="images/奖状2.jpg"'/></a>
<a href="images/奖状3.jpg" class="picture"><img   src="images/奖状3.jpg" width="460" height="340"  onmouseover='src="images/奖状3x.jpg"' onmouseout='src="images/奖状3.jpg"'/></a>
<a href="images/奖状4.jpg" class="picture"><img   src="images/奖状4.jpg" width="460" height="340"  onmouseover='src="images/奖状4x.jpg"' onmouseout='src="images/奖状4.jpg"'/></a>

<a href="images/奖状5.jpg" class="picture"><img   src="images/奖状5.jpg" width="460" height="340"  onmouseover='src="images/奖状5x.jpg"' onmouseout='src="images/奖状5.jpg"'/></a>
<a href="images/奖状6.jpg" class="picture"><img   src="images/奖状6.jpg" width="460" height="340"  onmouseover='src="images/奖状6x.jpg"' onmouseout='src="images/奖状6.jpg"'/></a>
<a href="images/奖状7.jpg" class="picture"><img   src="images/奖状7.jpg" width="460" height="340"  onmouseover='src="images/奖状7x.jpg"' onmouseout='src="images/奖状7.jpg"'/></a>
<a href="images/奖状8.jpg" class="picture"><img   src="images/奖状8.jpg" width="460" height="340"  onmouseover='src="images/奖状8x.jpg"' onmouseout='src="images/奖状8.jpg"'/></a> 


                  
 </section>           
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<hr>
<section id="teams">
<br><br><br><br><br><br><br><br><br>
	<div>
		<h1 style="text-align:center" > 我们的团队 </h1>	
		<p style="text-align:center" >团队的老师都富有经验，可以指导我们写出合乎规范的代码</p>
		<p style="text-align:center">里面也有学术能力较强的老师，我们也可以参与研究</p>
	</div>
</section>
   
   <section >
   		
   		
   		<div class="col-md-4 col-sm-6">
        <div class="person" style="text-align:center"> <img src="images/yao.jpg" alt="" class="img-responsive" style="height: 200px;">
          <div >
            <h4>姚老师</h4>
            <h5 class="role">技术大牛</h5>
            <p>实验室全栈开发,维护多个项目,有大项目的开发经验</p>
          </div>
          <ul class="social-icons clearfix">
         
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="person" style="text-align:center"> <img src="images/lei.jpg" alt="" class="img-responsive" style="height: 200px;">
          <div >
            <h4>雷老师</h4>
            <h5 class="role">实验室负责人</h5>
            <p style="">管理实验室的各方面事务,负责学生请假等各种事情。</p>
          </div>*
          
               
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="person" style="text-align:center"> <img src="images/ye.jpg" alt="" class="img-responsive" style="height: 200px;">
          <div  style="text-align:center">
            <h4>叶老师</h4>
            <h5 class="role">实验室科研主干</h5>
            <p>浙大博士，研究机器学习算法，</p>
            <p>多涉及人工智能领域，发表过多篇论文。</p>
          </div>
		
   </section>
   
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <br><br><br><br><br> 
  <br><br>
  
<section >
		<div id="testimonials">
		<br><br><br><br><br><br><br><br><br>
			<br><br><br>
			<div id="newslist">
<ul id="contain" style="text-align:center">
<li >"过放荡不羁的生活，容易得像顺水推舟，但是要结识良朋益友，却难如登天。" ——巴尔扎克</li>
<li>"如果你浪费了自己的年龄，那是挺可悲的。因为你的青春只能持续一点儿时间——很短的一点儿时间。"——王尔德</li>
<li>"我读的书愈多，就愈亲近世界，愈明了生活的意义，愈觉得生活的重要" ——高尔基</li>
<li>"人生并不像火车要通过每个站似的经过每一个生活阶段。人生总是直向前行走，从不留下什么。" ——刘易斯</li>
</ul>
</div><br>
<SCRIPT LANGUAGE="JavaScript">
function xx(){
var container=document.getElementById("contain");
container.appendChild(container.firstChild);
}
setInterval("xx()",2000);
</SCRIPT>
	<br><br>
			<div style="text-align:center">
			<button class="btn" style="width: 30px;height: 30px; border-radius:50%;" onclick="quote1()" >1</button>
			<button class="btn"style="width: 30px;height: 30px; border-radius:50%;" onclick="quote2()">2</button>
			<button class="btn" style="width: 30px;height: 30px; border-radius:50%;" onclick="quote3()">3</button>
			<button class="btn" style="width: 30px;height: 30px;;border-radius:50%;" onclick="quote4()">4</button>
		</div><br><br>
		</div>	
</section>

<hr>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<section id="contact">
<h1 style="text-align:center" >联系我们</h1>
<p style="text-align:center;font-size:40px">我们欢迎你的加入</p>
<p style="text-align:center;font-size:40px">练技术，喜欢代码，就来这里</p>

<div style="background: #ff4f0f;border-radius: 20px;height:200;text-align:center;" >      
        <div id="message" >
	<br><br><br>
          <p style="font-size: 2rem;color: white;text-align:center;">我们的联系方式:<br><br>
            QQ:672561214
          </p>

        </div>
        </div>

        
</section>
<br><br><br><br><br><br>
<div >
	<p style="text-align:center;color:blue;font-size:20px">您的任务栏</p>
	
</div>


</body>
</html>