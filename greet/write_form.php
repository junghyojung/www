<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/greet.css">
	<link rel="stylesheet" href="./css/sub6common.css">


<body>
<? include "../common/sub_header.html" ?>	
<div class="visual">
        <img src= "./images/magearzin_08.jpg" alt="비쥬얼메인">
        <h3>홍보센터</h3>
        <P>PUBLIC RELATIONS</P>


    </div>

     <div class="sub_menu">
        <ul class="menu">
            <li class="current_subli"><a href="../greet/list.php">뉴스센터</a></li>
            <li class="subli"><a href="./sub6_2.html">효성프랜즈</a></li>
            <li class="subli"><a href="./sub6_3.html">홍보자료</a></li>
        </ul>
    </div> 
<article id="content">
        <div class="title_area">
             <div class="line_map">home&gt;홍보채널&gt; <strong>뉴스센터</strong></div>
            <h2>뉴스센터</h2>
            <img src="./images/bule.png" alt="표시선">
</div>



<div id="wrap">
  <div id="header">

		</div>
	</div> <!-- end of col1 -->

	<div id="col2">        
		
	

		<form  name="board_form" method="post" action="insert.php"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject"></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit" value="글쓰기" >&nbsp;
								<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
<? include "../common/sub_footer.html" ?>
</body>
</html>