
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>상품</h3>
              </div>
		<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>상품 수정</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					<script>
						function select_country(){
							var str;
							str=form1.sel_country_no.value;
							if(str==""){
								form1.country_no.value="";
							}else{
								str=str.split("^^");
								form1.country_no.value=str[0];
							}
						}
						function find_country(){
							window.open("/~team5/admin_findcountry","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_city(){
							window.open("/~team5/admin_findcity","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_flight(){
							window.open("/~team5/admin_findflight","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
						function find_hotel(){
							window.open("/~team5/admin_findhotel","","resizeable=yes,scrollbar=yes,width=500,height=600");
						}
					</script>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
					name="form1" method="post" action="" enctype="multipart/form-data">

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">번호 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="no" value="<?=$row->no;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">한줄소개 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="intro" value="<?=$row->intro;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품명 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$row->name;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">상품명 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" value="<?=$row->name;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">국가 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="hidden" name="country_no" value="<?=$row->country_no?>">
                          <input type="text" name="country_name" value="<?=$row->country_name;?>" required="required" class="form-control col-md-7 col-xs-12"disabled>
						  <input type="button" value="국가찾기" onClick="find_country();" class="btn">
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">도시 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="city_no" value="<?=$row->city_no?>">
                          <input type="text" name="city_name" value="<?=$row->city_name?>" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="도시찾기" onClick="find_city();" class="btn">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">출발
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="departure" value="<?=$row->departure;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">도착
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="arrive" value="<?=$row->arrive;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">항공사 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="flight_no" value="<?=$row->flight_no?>">
                          <input type="text" name="flight_name" value="<?=$row->flight_name?>" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="항공사찾기" onClick="find_flight();" class="btn">
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">호텔 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="hotel_no" value="<?=$row->hotel_no?>">
                          <input type="text" name="hotel_name" value="<?=$row->hotel_name?>" class="form-control col-md-7 col-xs-12" disabled>
						  <input type="button" value="호텔찾기" onClick="find_hotel();" class="btn">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">가격 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="price" value="<?=$row->price;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					<div class="form-group">
					   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">이벤트</label>
                      <p>
                        &nbsp특가
                        <input type="radio" class="flat" name="event" value="0" checked="" required /> HIT
                        <input type="radio" class="flat" name="event" value="1" />
                      </p>						

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">재고 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="stock" value="<?=$row->stock;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">상품 특징 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<textarea name="point" value="<?=$row->point;?>" required="required" class="form-control col-md-7 col-xs-12" rows="5" cols="30"><?php echo $row->point?></textarea>
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">상품 설명 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<textarea name="guid" value="<?=$row->guid;?>" required="required" class="form-control col-md-7 col-xs-12" rows="10" cols="30"><?php echo $row->guid?></textarea>
                        </div>
                      </div>

						 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">상품추천도 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="recommend_no" value="<?=$row->recommend_no;?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">사진1 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic1 ?>
                          <input type="file" name="pic1" value="<?=$row->pic1;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">사진2 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic2 ?>
                          <input type="file" name="pic2" value="<?=$row->pic2;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">사진3 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic3 ?>
                          <input type="file" name="pic3" value="<?=$row->pic3;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">사진4 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic4 ?>
                          <input type="file" name="pic4" value="<?=$row->pic4;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

					  	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">사진5 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						 <b>파일이름</b> : <?=$row->pic5 ?>
                          <input type="file" name="pic5" value="<?=$row->pic5;?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">	
                        <div align="center">
						  <input type="submit" value="저장" class="btn">
						  <button class="btn" type="reset">초기화</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <input type="button" value="이전화면" class="btn" onClick="history.back();">

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
</div>


