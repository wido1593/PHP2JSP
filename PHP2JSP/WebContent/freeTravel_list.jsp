<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>

<%@ page import="java.util.*" %>

<%@ include file="main_header.jsp" %>	



<script>
$(function() {
		$('#text4') .datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD'
		});


		$("#text4") .on("dp.change", function (e) {
			find_text();
		});
	});
</script>
<link rel="stylesheet" href="../../my/usercss/style2.css%ver=1">
 
<%
	//$tmp = $text1 % "/text1/$text1/page/$page" : "/page/$page";   
%>

    
 <div class="hero-wrap js-fullheight" style="background-image: url('../../my/images/freetravel.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="../../">Home</a></span> <span>FREETRAVEL</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Free Travel</h1>
			<h3 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><font color="white">자유여행</font></h3>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">

      <div class="container">
	  <script>

    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="../../freeTravel/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="../../freeTravel/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value + "/text3/" + form1.text3.value + "/list";
		form1.submit();
    }

</script>
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">상품 찾기</h3>
        			<form name="form1" action="" method="post">
        				<div class="fields">
		              <div class="form-group">
		              <select name="text1" class="form-control form-control-sm" >
						<option value="0"> 국가 </option>
						<%
						/*
						foreach ($list2 as $row)
							{
								if ($row->name==$text1)
									out.print("<option value='$row->name' selected>$row->name </option>");
								else
									out.print("<option value='$row->name'>$row->name</option>");
							}
						*/
						%>
					</select>


		              </div>

					

						  <section class="range-slider">
						  <span class="rangeValues"></span>
						  <input name="text2" value="100000" min="100000" max="5000000" step="500" type="range" >
						  <input name="text3" value="5000000" min="500000" max="5000000" step="500" type="range" >
						</section>

		              <div class="form-group">
		                <div class="select-wrap one-third">
	                   
	                  </div>
		              </div>
		              
		              <div class="form-group">
		                <input type="submit" value="검색" class="btn btn-primary py-3 px-5" onClick="find_text();">


		              </div>
		            </div>
	            </form>
        		</div>

        		
          </div>



         <div class="col-lg-9">
          	<div class="row" id="list">
<%
	ArrayList<FreeTravelDTO> al = 
		(ArrayList<FreeTravelDTO>) request.getAttribute("freeTravelList");
	for(FreeTravelDTO dto : al)	{
		
		int key=0;
		int no=dto.getNo();   
		 
%> 
-->
		  <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<%  
									if(dto.getRecommend_no() == 5)
									{								
										out.println("<div class='ribbon_3 popular'><span>추천</span></div>");
									}
								%>


							
								<div class="img_list">
								<!-- <a href="../../freeTravel/view/no/<%=no %><%=$tmp;%>"><img src="../../img/<%=dto.getPic1()%>" alt="Image"> -->
									<a href="../../freeTravel/view/no/<%=no %>"><img src="../../img/<%=dto.getPic1()%>" alt="Image">
									</a>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="tour_list_desc">
								<span class="subheading"><%=dto.getName()%>,  <%=$row->city_name%></span>
									
									<div class="rating">	<%
										if(dto.getRecommend_no() == 1)
										{
											out.print ("<p class='rate'>
														<i class='icon-star-o'></i>
														<i class='icon-star-o'></i>
														<i class='icon-star-o'></i>
														<i class='icon-star-o'></i>
														</p>");
										}
										else if (dto.getRecommend_no() == 2 )
										{
											out.print ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}

										else if (dto.getRecommend_no() == 3 )
										{
											out.print ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if (dto.getRecommend_no() == 4 )
										{
											out.print ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star-o'></i>
													</p>");
										}
										else if (dto.getRecommend_no() == 5 )
										{
											out.print ("<p class='rate'>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													<i class='icon-star'></i>
													</p>");
											}
	%>
									</div>
									<h3><a href="../../freeTravel/view/no/<%= no %><%=$tmp;%>"><font color="black"><%=dto.getName()%></font></a></h3>
									<p><%=dto.getIntro%></p><br>

									
								</div>
							</div>
							<div class="col-lg-2 col-md-2">
								<div class="price_list">
								
									<div><sup></sup><font size="2">비행기 최저가</font><%=  number_format($row->flight_min_price);%>원<span class="normal_price_list"></span><small>*1인기준</small>


										<p><a href="../../freeTravel/view/no/<%= no %><%= $tmp;%>" class="btn_1">보기</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>

					<%
	}
%>
				</div><%=$pagination;%>
			</div>
					<!--End strip -->



        </div>
      </div>
    </section> <!-- .section -->



    <%@ include file="main_footer.jsp" %>	
