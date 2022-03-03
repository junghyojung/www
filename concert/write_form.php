<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table=concert
// 수정글쓰기 =>  $table, $sum, $page,$mode

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>효성그룹</title>

	<link rel="stylesheet" href="../common/css/common.css">
	 <link rel="stylesheet" href="./common/css/concert.css">
	<link rel="stylesheet" href="./common/css/list.css">

    <script src="https://kit.fontawesome.com/087fc1f4e8.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>


	<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
<div class="wrap">
       <!-- 서브 헤더영역 -->
	   <? include "../common/sub_header.html" ?>

	   <div class="visual">
        <img src= "./images/magearzin_08.jpg" alt="비쥬얼메인">
        <h3>홍보센터</h3>
        <P>PUBLIC RELATIONS</P>
		</div>

		<div class="sub_menu">
        <ul class="menu">
            <li class="current_subli"><a href="../greet/list.php">뉴스센터</a></li>
			<li class="subli"><a href="../event/list.php">효성프렌즈</a></li>
            <li class="subli"><a href="../sub6/sub6_3.html">홍보자료</a></li>
        </ul>
    </div> 

	
	<article id="content">
        <div class="title_area">
             <div class="line_map">home&gt;홍보채널&gt; <strong>뉴스센터</strong></div>
            <h2>뉴스센터</h2>
            <img src="./images/bule.png" alt="표시선">

        </div>
</body>
</html>



<  <div class="content_area">

<?
if($mode=="modify")
{

?>
<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
}
else
{
?>
<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
}
?>
<div id="write_form">
<div class="write_line"></div>
<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>
<?
if( $userid && ($mode != "modify") )
{
?>
	<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
}
?>						
</div>
<div class="write_line"></div>
<div id="write_row2"><div class="col1"> 제목   </div>
					 <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
</div>
<div class="write_line"></div>
<div id="write_row3"><div class="col1"> 내용   </div>
					 <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
</div>
<div class="write_line"></div>

<div class="img_wrap">
<ul id="write_row4"><li class="col1"> 이미지파일1   </li>
					 <li class="col2"><input type="file" name="upfile[]"></li>
</ul>
<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
{
?>
<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
<div class="clear"></div>
<?
}
?>
<div class="write_line"></div>
<ul id="write_row5"><li class="col1"> 이미지파일2  </li>
					 <li class="col2"><input type="file" name="upfile[]"></li>
</ul>
<? 	if ($mode=="modify" && $item_file_1)
{
?>
<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
<div class="clear"></div>
<?
}
?>
<div class="write_line"></div>
<div class="clear"></div>
<ul id="write_row6"><li class="col1"> 이미지파일3   </li>
					 <li class="col2"><input type="file" name="upfile[]"></li>
</ul>
<? 	if ($mode=="modify" && $item_file_2)
{
?>
<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
<div class="clear"></div>
<?
}
?>
</div>

<div class="write_line"></div>

<div class="clear"></div>
</div>

<div id="write_button"><a href="#" onclick="check_input()">완료</a>&nbsp;
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
</div>

</form>

</div>

</article>

<!-- 서브 푸터영역 -->

<? include "../common/sub_footer.html" ?>

</div>
<!--JQuery-->

</body>
</html>