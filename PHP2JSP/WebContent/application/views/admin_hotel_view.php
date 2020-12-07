<?
		$no=$row->no;                     
      
		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";

?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>호텔</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>호텔 세부정보</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="">

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$no; ?></td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 호텔명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 가격
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->price; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 국가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->country_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 도시
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->city_name; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 주소
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->address; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 위도
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->lat; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 경도
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->lng; ?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 평점
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?
							$score=$row->score;
							if($score==0){
						?>
								☆☆☆☆☆&nbsp;&nbsp;
						<?
							}else if($score==1){
						?>
								★☆☆☆☆&nbsp;&nbsp;
						<?
							}else if($score==2){
						?>
								★★☆☆☆&nbsp;&nbsp;
						<?
							}else if($score==3){
						?>
								★★★☆☆&nbsp;&nbsp;
						<?
							}else if($score==4){
						?>
								★★★★☆&nbsp;&nbsp;
						<?
							}else{
						?>
								★★★★★&nbsp;&nbsp;
						<?}?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 설명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->information; ?>
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="info mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 사진
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
             <?
				if($row->img)
					echo("<img src='/~team5/img/$row->img' width='200' class='img-fluid img-thumbnail'>");
				else
					echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
			?>
        </div>
    </td>
</tr>

</table>
</form>
		<div align="center">
			<a href="/~team5/admin_hotel/edit<?=$tmp; ?>" class="btn btn-sm mycolor1">수정</a>
			<a href="/~team5/admin_hotel/del<?=$tmp; ?>" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</a>&nbsp;

			<input type="button" value="이전화면" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>

</div>
