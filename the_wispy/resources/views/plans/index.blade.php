@extends('layouts.user')@section('content')<?php $servername = "localhost";$username = "jawwadaf_cp_u_1";$password = "6HWZe5PIQ{.H";$dbname = "jawwadaf_cp_yspy";// Create connection$conn = new mysqli($servername, $username, $password, $dbname);// Check connectionif ($conn->connect_error) {    die("Connection failed: " . $conn->connect_error);}$sql1 = "SELECT * FROM `plans` WHERE title like '%Basic%'";$result1 = $conn->query($sql1);$sql2 = "SELECT * FROM `plans` WHERE title like '%Pro%'";$result2 = $conn->query($sql2);$sql3 = "SELECT * FROM `plans` WHERE title like '%Ultimate%'";$result3 = $conn->query($sql3);?><article class="pricing-tab-section">					<figure class="container">						<section class="price-tab">							<!-- Nav tabs -->							  <ul class="nav">								<li class="nav-item">								  <a style="border-right:0px;" class="navigation-link first-link active" data-toggle="tab" href="#home"><img src="http://www.thewispy.com/wp-content/themes/twentysixteen/images/price-andriod.png"/>Android</a>								</li>								<li class="nav-item">								  <a class="navigation-link second-link" data-toggle="tab" href="#menu1"><img src="http://www.thewispy.com/wp-content/themes/twentysixteen/images/price-andriod.png" />IOS</a>								</li>							  </ul>							   <div class="tab-content">									<div id="home" class="tab-pane active"><br>										<section class="price-box">											<img src="http://www.thewispy.com/wp-content/themes/twentysixteen/images//basic.png" />											<h1>Basic Version</h1>											<h2 class="setval"></h2>											<?php 											$count1=0;											while($row1 = $result1->fetch_assoc())											{												$count1++;											?>											<p>												<input type="radio" id="signup" class="signup1" name="basic" value="<?php echo $row1['id'];?>" <?php if($count1==1):echo "checked='checked'";else:echo "";endif;?> data-<?php echo $row1['id'];?>="<?php echo $row1['id'];?>" data-costprice-<?php echo $row1['id'];?>="<?php echo $row1['cost_price'];?>" data-default-first-<?php echo $count1;?>="<?php echo $row1['cost_price'];?>" data-month-val-<?php echo $row1['id'];?>="<?php echo preg_replace("/[^0-9]/", '',$row1['title']);?>">											<label for="signup"><?php echo $row1['title']." "."$".$row1['cost_price'];?>    <span class="overline"><?php echo "$".$row1['sale_price'];?></span></label>											</p>										<?php } ?>											<a class="learn-more getbasic" href="javascript:void(0)">Get Plan</a>										</section>										<section class="price-box">											<img src="http://www.thewispy.com/wp-content/themes/twentysixteen/images//standard.png" />											<h1>Pro Version</h1>											<h2 class="setvalpro"></h2>											<?php 											$count2=0;											while($row2 = $result2->fetch_assoc())											{												$count2++;																							?>											<p>												<input type="radio" id="signup" class="pro" name="pro" value="<?php echo $row2['id'];?>" <?php if($count2==1):echo "checked";else:echo "";endif;?> data-<?php echo $row2['id'];?>="<?php echo $row2['id'];?>" data-costprice-<?php echo $row2['id'];?>="<?php echo $row2['cost_price'];?>" data-default-pro-<?php echo $count2;?>="<?php echo $row2['cost_price'];?>" data-month-val-<?php echo $row2['id'];?>="<?php echo preg_replace("/[^0-9]/", '',$row2['title']);?>">											<label for="signup"><?php echo $row2['title']." ". "$".$row2['cost_price'];?> <span class="overline"><?php echo "$".$row2['sale_price'];?></span></label>											</p>										<?php } ?>									<a class="learn-more getpro" href="javascript:void(0)">Get Plan</a>										</section>										<section class="price-box">											<img src="http://www.thewispy.com/wp-content/themes/twentysixteen/images//pro.png" />											<h1>Ultimate Version</h1>											<h2 class="setultimate"></h2>																			<?php 											$count3=0;											while($row3 = $result3->fetch_assoc())											{												$count3++;												//print_r($row1);											?>											<p>												<input type="radio" id="signup" class="ultimate" name="ultimate" value="<?php echo $row3['id'];?>" <?php if($count3==1):echo "checked";else:echo "";endif;?> data-<?php echo $row3['id'];?>="<?php echo $row3['id'];?>" data-costprice-<?php echo $row3['id'];?>="<?php echo $row3['cost_price'];?>" data-default-ultimate-<?php echo $count3;?>="<?php echo $row3['cost_price'];?>" data-month-val-<?php echo $row3['id'];?>="<?php echo preg_replace("/[^0-9]/", '',$row3['title']);?>">											<label for="signup"><?php echo $row3['title']." ". "$".$row3['cost_price'];?> <span class="overline"><?php echo "$".$row3['sale_price'];?></span></label>											</p>										<?php } ?>											<a   href="javascript:void(0)" class="learn-more getplanultimate">Get Plan</a>										</section>									</div>									<div id="menu1" class="container tab-pane fade"><br>									  <h1>Coming Soon</h1>									</div>										</div>						</section>					</figure>				</article>				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script type="text/javascript">$( document ).ready(function() {	$(".setval").html("$"+ $(".signup1").attr("data-default-first-1"));	$(".setvalpro").html("$"+ $(".pro").attr("data-default-pro-1"));	$(".setultimate").html("$"+ $(".ultimate").attr("data-default-ultimate-1"));	});$('.signup1').on('input',function(e){var pkgprice=$(this).attr("data-costprice-"+$(this).val());var monthval=$(this).attr("data-"+$(this).val());var actualmonthval=$(this).attr("data-month-val-"+$(this).val());var calval=(pkgprice/actualmonthval).toFixed(2);$(".setval").html("$"+calval);});////////////////////////$('.pro').on('input',function(e){var pkgprice=$(this).attr("data-costprice-"+$(this).val());var monthval=$(this).attr("data-"+$(this).val());var actualmonthval=$(this).attr("data-month-val-"+$(this).val());var calval=(pkgprice/actualmonthval).toFixed(2);$(".setvalpro").html("$"+calval);});/////////////////$('.ultimate').on('input',function(e){var pkgprice=$(this).attr("data-costprice-"+$(this).val());var monthval=$(this).attr("data-"+$(this).val());var actualmonthval=$(this).attr("data-month-val-"+$(this).val());var calval=(pkgprice/actualmonthval).toFixed(2);$(".setultimate").html("$"+calval);});	$('.getplanultimate').on('click',function(e){	  var radioValue = $("input[name='ultimate']:checked").val();	  document.location.href = "{{url('checkout')}}"+"/"+radioValue;}); $('.getpro').on('click',function(e){	  var radioValue = $("input[name='pro']:checked").val();	  document.location.href = "{{url('checkout')}}"+"/"+radioValue;});$('.getbasic').on('click',function(e){	  var radioValue = $("input[name='basic']:checked").val();	  document.location.href = "{{url('checkout')}}"+"/"+radioValue;});</script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">								<link rel="stylesheet" href="http://www.thewispy.com/wp-content/themes/twentysixteen/inc/old.css">								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">								<style type="text/css">								.overline 								{ 								text-decoration: line-through solid; 								} 								</style><div class="row bg-title">@if (session('status'))    <div class="alert alert-success">        {{ session('status') }}    </div>@endif                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">                        <h4 class="page-title">My Devices</h4> </div>                    </div>                    <!-- /.col-lg-12 -->                <div class="row">                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">	                        <div class="white-box">                            <h3 class="box-title"> Active Device(s) Monitored by TheWiSpy</h3>                            @if($clientlist->isEmpty())							No devices							@else:							@foreach ($clientlist as $client)							<div class="device-box">								<div class="col-md-8">									<div class="col-md-4">										<i class="fa fa-user-circle fa-fw" aria-hidden="true"></i>									</div>									<div class="col-md-8">										<h4 class="device-title"><a href="{{url('dashboard/'.$client->id)}}">TheWiSpy For Android</a></h4>										<li data-toggle="tooltip" title=""><i class="fa fa-mobile fa-fw" aria-hidden="true"></i>{{$client->modal}}</li>										<li><i class="fa fa-assistive-listening-systems fa-fw" aria-hidden="true"></i>{{$client->manufacturer}}</li>										<li><i class="fa fa-key fa-fw" aria-hidden="true"></i>{{$client->uniqueid}}</li>										<li><i class="fa fa-id-badge fa-fw" aria-hidden="true"></i> {{$client->IMEI	}}</li>									</div>								</div>							</div>							@endforeach							@endif                        </div>                    </div>                </div>	@endsection