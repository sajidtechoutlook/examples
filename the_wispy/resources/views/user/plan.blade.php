@extends('layouts.user')
@section('pageTitle', 'Dashboard for Remote Mobile Monitoring') 
@section('content')
<style>
label {font-size:12px;}
.active_plan{color: green !important;font-weight: 700 !important;}
.container {max-width:100%;}
.pricing-tab-section .nav {max-width:230px; margin:0px auto; display:block !important; overflow:hidden;}
.pricing-tab-section .nav li {float:left; text-align:center; }
.pricing-tab-section .nav li a img {margin-right:10px;}
.pricing-tab-section .nav li a {padding:10px 20px; border:1px solid #808285; display: inline-block;
line-height: 35px;}
.pricing-tab-section .navigation-link.active {background:yellow;}
.first-link {border-top-left-radius:10px; border-bottom-left-radius:10px;}
.second-link {border-top-right-radius:10px; border-bottom-right-radius:10px;}
.price-box {width:31%!important; padding:0px 0px; box-sizing:border-box; text-align:center;
margin: 20px 10px;
/*min-height: 565px;*/
border-radius: 5px 5px 0 0;
overflow: hidden;
padding-top: 0px; margin-top:60px; border-left: 1px solid #ccc;
border-right: 1px solid #ccc;
border-bottom: 1px solid #ccc;}
.price-box.One_dollar_Deal-plan-box.col-sm-4.col-md-4.pricing {margin-top:12px; box-shadow: 0 0 15px 0 rgba(153,153,153,.4);}
.tab-data {display: flex;overflow: hidden;}
.tab-content>.active {overflow: hidden; /*display: flex!important;*/} 
/*.price-box h1 {font-size:25px; color:#fff; padding:20px 0px;background-color: #39b54a;
margin: 0px;
font-weight: 400;
padding: 0px;}*/
.price-box h2 {font-size:40px; color:#000000;font-weight: 400;margin: 20px 0px}
.faq-section {width:auto; margin:0px auto; padding:90px 0px; padding-bottom:0px;}
.faq-section h1 {text-align:center; font-size:30px; font-weight:500; color:#000;}
.faq-section p {color:#000; font-size:12px; text-align:center;}
.faq-box {width:50%; float:left; padding:0px 15px; box-sizing:border-box;}
.price-box p {color:#; font-size:16px; font-weight:400; padding-bottom:15px;}
.price-box p img {margin-right:20px;}
.price-box p.disable {margin-left:40px; color:gray;}
.we-can-do-pricing {width:auto; margin:0px auto; padding:90px 0px; background:#F1F2F2; margin-top:90px;}
.we-can-do-pricing h1 {text-align:center; font-size:30px; color:#414042; padding-bottom:20px; font-weight:500;}
.we-can-do-pricing p {text-align:center; color:#6F6F6F; font-size:12px; margin-bottom:100px !important	; }
.cndo-pricing-box {width:30%; margin:0px 1.5%; float:left; padding:0px 10px; box-sizing:border-box; text-align:center; cursor:pointer; padding:60px 20px; box-sizing:border-box;}
.cndo-pricing-box:hover {background:yellow;}
.cndo-pricing-box:hover .forward-icon {display:block;}
.cndo-pricing-box:hover .forward-icon img {position: absolute; z-index: 9999; margin-left: -35px;
margin-top: 30px;}
.cndo-pricing-box .forward-icon {display:none;}
.cndo-pricing-box h2 {color:#414042; font-size:18px; font-weight:500; padding-bottom:15px; padding-top:15px;}
.cndo-pricing-box.last-box h2 {padding-bottom:35px;}
.cndo-pricing-box p {color:#6F6F6F; font-size:12px; margin:0px !important; line-height:25px; text-align:left;}
.cndo-img img {position: absolute; margin-top: -112px;margin-left: -60px}
.cndo-pricing-box:hover .cndo-img img {filter: brightness(0) invert(1);}
.faq-box {width:50%; float:left; padding:0px 10px; box-sizing:border-box;}
.accordian-section {background:#F1F2F2; padding:20px 20px; box-sizing:border-box; margin-bottom:20px; border-radius:20px;}
.accordian-section .fa {margin-right:30px; font-size:12px; color:#414042;}
.accordian-section button {font-weight:500; border:none; font-size:16px; color:#414042; cursor:pointer}
.accordian-section p {font-size:12px; color:#414042;}
.accordian-body {padding-top:30px; padding-left:45px;}
.accordian-body p {text-align:left;}
.faq-content {overflow:hidden; padding-top:60px;}
.price-box.col-md-4.pricing img {width: auto!important;height: auto!important;}

.learn-more:hover {color: #ec008c;background: #fff;}
.learn-more {color: #fff;
padding: 15px 40px;
border-radius: 10px;
background: #ec008c;
font-size: 14px;
font-weight: 500;
display: inline-block;
margin-right: 20px;
border: 1px solid #ec008c!important;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
margin-bottom: 10px;
margin-top: 10px;}

.white-box.plan-setting {margin-top: 15px;}
.price-offer-list {margin:20px 0px;}
.price-offer-list li {list-style-type:none; text-align:center; margin-bottom:10px;font-size: 12px;padding-left: 10px;padding-right: 10px}
.price-offer-list li img {margin-right:5px;}
.overline 
{ 
text-decoration: line-through solid; font-size: 12px;color: #999;
} 
/*.overlinecol
{ 
text-decoration: line-through solid red; font-size: 12px;
} */
.learn-more.sub_btn{padding:5px 30px!important;margin-right: 0px;font-weight: 500;}
.basic-7 { min-height: 63px;}
.price-box.col-md-12.pricing label { font-size: 16px!important;color: #6a6a6a;font-weight: 400;}
.price-box.col-sm-4.col-md-4.pricing label{ font-size: 16px!important;color: #6a6a6a;font-weight: 400;}
.setval_mob_basic span {
    font-size: 2.5rem;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999;margin-right: -8px;
}.setval_mob_pro span {
    font-size: 2.5rem;margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999;
}.setval_mob_ultimate span {
    font-size: 2.5rem;margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999;
}
.setval_basic span {
    font-size: 2.5rem;margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color:#999;
}
.setval_pro span {
    font-size: 2.5rem;margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999
}
.setval_ultimate	 span {
    font-size: 2.5rem;margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999;
}
.tab-content {
	border-radius: 5px 5px 0px 0px;
    margin-top: 30px;}
    .nav-fill .nav-item{flex: 1 1 auto;text-align: center;}
    .mobile-section ul {display: inline-block;min-width: 789px;
text-align: center;}
.nav.nav-tabs.nav-fill.newnav {
    max-width: none !important;
    display: flex !important;
}
.nav-item.new-item a {display: block !important; border: none !important;}
.nav-item.new-item .nav-link.active {background: transparent !important; border: none !important; border-bottom: 3px solid #ec008c !important;}
.tab-content.new {
    margin-top: 20px !important;
}
.price-offer-list ul {margin: 0px auto;display: block;max-width: 370px;}
.price-box.col-sm-4.col-md-4.pricing h2 span {
    font-size: 2.5rem;
    margin-right: -8px;
    line-height: 1.375rem;
    vertical-align: top;
    color: #999;
    display: inline-block;
}
.purchase-progress {
    background: #F1F2F2;
    padding: 15px 0;
	overflow:hidden;
	margin-bottom:25px; border-radius:4px;
	
}
.purchase-progress .wrapper {
    width: 570px;
    margin: 0 auto;
}
.purchase-progress .item.active {
    background: #ec008c;
    color: #fff;
}
.purchase-progress .item {
    float: left;
width: 32px;
line-height: 30px;
background: #fff;
border: 2px solid #ec008c;
border-radius: 50%;
text-align: center;
color: #333;
font-size: 17px;
}
.purchase-progress .line-cut {
    float: left;
    width: 235px;
    height: 2px;
    background: #ec008c;
    position: relative;
    top: 15px;
}
.clear:after {
    display: block;
    clear: both;
}
.device_os_name {text-align:center;margin-top: 30px;}
.device_os_name i {color: #333333;
margin-right: 5px;
font-size: 18px;
vertical-align: middle;
margin-top: -5px;}
.device_os_name i:hover {color:#ec008c}
.device_os_name p {font-size:18px; color:#333; font-weight:400;}
.physical_para {font-size: 10px !important; color: #666 !important;text-align: center !important; border-bottom:1px solid #d8d8d8; margin-top:10px;}
.price-box:nth-child(2n+1) h1 {background:#ec008c;}



.price-box.Basic-plan-box.col-sm-4.col-md-4.pricing h1 {
    font-size: 30px;
    line-height: 48px;
    color: #fff;
    padding: 20px 0px;
    background-color: #39b54a;
    margin: 0px;
    font-weight: 700;
    padding: 0px;
}
.price-box.Premium-plan-box.col-sm-4.col-md-4.pricing h1 {
    font-size: 30px;
    line-height: 48px;
    color: #fff;
    padding: 20px 0px;
    background-color: #39b54a;
    margin: 0px;
    font-weight: 700;
    padding: 0px;
}
.price-box.One_dollar_Deal-plan-box.col-sm-4.col-md-4.pricing h1 {
    font-size: 30px;
    line-height: 48px;
    color: #fff;
    padding: 20px 0px;
    background-color: #dfa22d;
    margin: 0px;
    font-weight: 700;
    padding: 0px;
}
.price-box.Ultimate-plan-box.col-sm-4.col-md-4.pricing h1 {
    font-size: 30px;
    line-height: 48px;
    color: #fff;
    padding: 20px 0px;
    background-color: #ec008c;
    margin: 0px;
    font-weight: 700;
    padding: 0px;
}

.learn-more.sub_btn.basic {
    border: 1px solid #39b54a;
    margin-right: 0px;
}

.learn-more.sub_btn.basic:hover {
    background: #39b54a;
}

.learn-more.sub_btn.starter:hover {
    background: #dfa22d;
}

.learn-more.sub_btn.starter {
    border: 1px solid #dfa22d;
    margin-right: 0px;
}
.learn-more.sub_btn.ultimate {
    margin-right: 0px;
}

</style>

<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="white-box plan-setting">
		<section class="checkout-back">
<section class="checkout-img">
	<div class="new-lable-img">
		<img src="{{ asset('uploads/checkout/icon-dashboard-active.png')}}">
		<div class="arrow-active">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>

		</div><div class="checkout-active">
		<p>1.<span>Dashboard</span></p>
		</div>

	</div>
	<div class="new-lable-img">
		<img src="{{ asset('uploads/checkout/icon-checkout-normal.gif')}}">
		<div class="arrow-not-active">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</div>
		<div class="checkout-not-active">
		<p>2.<span>Checkout</span></p>
	</div>
	</div>
	<div class="new-lable-img">
		<img src="{{ asset('uploads/checkout/icon-thanks-normal.gif')}}">
		<div class="arrow-not-active">

		</div>
		<div class="checkout-not-active">
		<p>3.<span>Review & Thanks</span></p>
	</div>
	</div>
</section>

</section>
			<article class="pricing-tab-section desktop_version">
				<figure class="">

					@if (session('msg'))
					<div class="alert alert-danger">
						{{ session('msg') }}
					</div>
					@endif
					<section class="price-tab">
					<div class="device_os_name">
						<br>

	@if(session()->get('invalid'))
		<div class="alert alert-warning" role="alert">
  			{{ session()->get('invalid') }}
		</div>

		@endif
								<p><i class="fa fa-android" aria-hidden="true"></i>Android Monitoring</p>
							</div>
						<div class="tab-data-section-full-length">
							<div class="tab-content">


								<div id="home" class="tab-pane active"><br>
									@foreach($plans_group as $row)
										@if($free_user_check > 0)
											@if ( $row->type != 'one_dollar_Deal' )

											@include('plans.show_plans_desktop_version')
										@endif

										@else
											@include('plans.show_plans_desktop_version')
										@endif
									@endforeach
									</div>


									<div id="menu1" class="container tab-pane fade"><br>
										<div class="col-md-12">
											<h1>Coming Soon</h1>
										</div>
									</div>	
								</div>
							</div>


						</section>
					</figure>
				</article>


				<!----------------------------------------------------------->
				<!------------------------Mobile Veriosn--------------------->
				<!----------------------------------------------------------->
				<div class="pricing-tab-section pricing-mobile-version">
					<figure class="">

					@if (session('msg'))
					<div class="alert alert-danger">
						{{ session('msg') }}
					</div>
					@endif
					<section class="price-tab">
						<div class="device_os_name">
								<p><i class="fa fa-android" aria-hidden="true"></i>Android Monitoring</p>
							</div>
						<!-- Nav tabs -->
						<!-- <ul class="nav">
							<li class="nav-item">
								<a style="border-right:0px;" class="navigation-link first-link active" data-toggle="tab" href="#home_mobile"><img src="https://www.thewispy.com/wp-content/themes/twentysixteen/images/price-andriod.png"/>Android</a>
							</li>
							<li class="nav-item">
								<a class="navigation-link second-link" data-toggle="tab" href="#menu1_mobile"><img src="https://www.thewispy.com/wp-content/uploads/2020/07/Apple-1.png" />IOS</a>
							</li>
						</ul>
 -->

						<div class="">
							<div class="tab-content new">
								<div id="home_mobile" class="tab-pane active"><!-- <br> -->
									<!-- Nav pills -->
					<ul class="nav nav-tabs nav-fill newnav" role="tablist">

						@foreach($plans_group as $index=>$rowz)

						@if($free_user_check > 0)
										@if ( $rowz->type != 'one_dollar_Deal' )
											<li class="nav-item new-item">
							<a class="nav-link {{ ($index==0)?'active':'' }}" data-toggle="pill" href="#{{ucfirst($rowz->type)}}">
								{{($rowz->type == "one_dollar_Deal")?"Starter":ucfirst($rowz->type).' ' }} 
							</a>

						</li>
										@endif
								@else
									<li class="nav-item new-item">
							<a class="nav-link {{ ($index==0)?'active':'' }}" data-toggle="pill" href="#{{ucfirst($rowz->type)}}">
								{{($rowz->type == "one_dollar_Deal")?"Starter":ucfirst($rowz->type).' ' }} 
							</a>

						</li>
								@endif

								
						
						@endforeach
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						@foreach($plans_group as $index=>$row1)
								@if($free_user_check > 0)
										@if ( $row1->type != 'one_dollar_Deal' )
											@include('plans.show_plans_mobile_version')
										@endif
								@else
									@include('plans.show_plans_mobile_version')
								@endif
							@endforeach
						</div>
									</div>
									<div id="menu1_mobile" class="container tab-pane fade"><br>
										<div class="col-md-12">
											<h1>Coming Soon</h1>
										</div>
									</div>	
								</div>
							</div>


						</section>
					</figure>
				</div>



				</div>
			</div>
		</div>
@endsection

@section('scripts')

	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.check_monthly_val').click(function(){
				var plan_type = $(this).attr('plan_type');
				var get_time = $('.setval_'+plan_type +' > p').html();
				// alert(get_time);
				$('.setval_'+plan_type).html("<span>$</span>&nbsp;"+$(this).attr('cost_price')+"<p style='display: inline-block;color: #6D6E71;'> "+get_time+"</p>");
			})

			$('.check_monthly_val_mob').click(function(){
				// alert("dfdf");
				var plan_type = $(this).attr('plan_type_mob');
				var get_time = $('.setval_'+plan_type +' > p').html();
				// alert(plan_type);
				$('.setval_mob_'+plan_type).html("<span>$</span>&nbsp;"+$(this).attr('cost_price')+"<p style='display: inline-block;color: #6D6E71;'> "+get_time+"</p>");
			})
		});

		$(document).ready(function(){
			$('.sub_btn').click(function(e){
				e.preventDefault();
				var res = $(this).parent().find("input[name='plan_already_taken']").val();
				if(res != null){
				alert('You have already buy this plan')
					}
					else{
						 $(this).parent().submit();

					}
			})
		});

				$(document).ready(function(){
			$('.check_plan_type').each( function(index){
				var plan_type = $(this).attr('plan_type');
				var plan_type_mob = $(this).attr('plan_type_mob');

				$("input[plan_type="+ plan_type +"]").each( function(index){
					if(index == 0){
						$(this).attr('checked', 'checked');
					}
				})

				$("input[plan_type_mob="+ plan_type_mob +"]").each( function(index){
					if(index == 0){
						$(this).attr('checked', 'checked');
					}
				})
			});
		});

	</script> 

@endsection 