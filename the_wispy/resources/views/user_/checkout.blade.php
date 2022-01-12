@extends('layouts.register')

@section('content')


<style type="text/css">
	
		body{

    font-family: 'Varela Round', sans-serif !important; overflow-x:hidden;}
html, body {
	margin:0px!important;
	padding:0px!important;
}
html, body, div, ul, ol, li, dl, dt, dd, h1, h2, h3, h4, h5, h6, pre, form, p, blockquote, fieldset, input, hr ,figure,marquee,img { margin:0; padding:0;  }
fieldset {border:0}
a {text-decoration:none;}
a img{border:none;}
hr{}
p{margin-bottom:0px !important; line-height:18px; font-size:12px; color:#6D6E71;}
p span{}
p a{}
h1,h3,h5,h6 {}
h1{}
h1 span{}
h2{font-size:16px; color:#707070;}
h2.main-section-heading {font-size:30px; color:#414042; text-align:center; padding-bottom:10px;}
h2 span{} 
h3{font-size:20px; color:#000000;}
h3 span{}
h4{}
h4 span{}
h5{}
h6{}
h6 span {}

li{ list-style:none;}
ul {margin-top:0px; margin-bottom:0px;}

.clearfix:after {content: ".";display: block;clear: both;visibility: hidden;line-height: 0;height: 0;}
.clearfix {display: inline-block;}
html[xmlns] .clearfix {display: block;}
* html .clearfix {height: 1%;}

.alignleft{}

.container {margin:0px auto !important; width:100% !important; max-width:1280px !important; box-sizing:border-box; overflow:hidden;padding:0px !important;}
.container:after {
	content: ".";
	display: block;
	height: 0;
	visibility: hidden;
}

			#check_section {width:auto; margin:0px auto; padding:60px 0px;}
			.checkout-product-section {width:auto; margin:0px auto; border:1px solid #D1D3D4; padding-bottom:30px;}
			.checkout-product-heading {width:auto; margin:0px auto; padding:30px 10px; background:#FFF200; overflow:hidden;}
			.checkout-product-description {width:auto; margin:0px auto; padding-top:30px; padding-left:10px; overflow:hidden;}
			.column-1 {width:40%; float:left;}
			.column-2 {width:15%; float:left;} 
			.checkout-product-heading p {font-size:16px;}
			.coupon-left-section {width:50%; float:left; text-align:left}
			.coupon-right-section {width:50%; float:left; text-align:right}
			#coupon-section {padding-top:30px; overflow:hidden;}
			#info-payment {width:auto; margin:0px auto; padding-bottom:60px;}
			#info-payment::placeholder {font-size:12px; color:#6D6E71;}
			.info-section {width:50%; float:left; padding-right:20px; box-sizing:border-box;}
			.payment-section {width:50%; float:left;}
			#info-payment input[type=text] {width:100%; padding:10px; box-sizing:border-box; margin:10px 0px; font-size:12px; color:#6D6E71;}
			#info-payment #country {width:100%; padding:10px; box-sizing:border-box; margin:10px 0px;font-size:12px; color:#6D6E71;}
			.date-section {width:50%; float:left;}
			.checkbox-section {margin-top:10px; margin-bottom:10px; clear:both; display:inline-block;}
			.first-child-date {padding-right:20px; box-sizing:border-box;}
			.checkbox-section p {padding-bottom:20px;}
			.checkbox-section input[type=checkbox] {margin-right:10px;}
			.acoount-id {
			color: #1C75BC;
			font-size: 16px;
			}
			.payment-section img {padding-top:10px;}
			.anchor-btn {
    color: #414042;
    padding: 15px 40px;
    border-radius: 10px;
    background: yellow;
    font-size: 14px;
    font-weight: 500;
    display: inline-block;
    margin-right: 20px;
    border: 1px solid yellow;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    margin-bottom: 10px;
}
.anchor-btn:hover {
    background: transparent;
    border: 1px solid yellow;
    box-shadow: none;
}
		</style>
		<link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">

<section id="check_section">
	<article class="container">
		<figure class="checkout-product-section">
			<section class="checkout-product-heading">
				<article class="column-1">
					<p>
						Product Name
					</p>
				</article>
				<article class="column-2">
					<p>
						Unit Price
					</p>
				</article>
				<article class="column-2">
					<p>
						Discount
					</p>
				</article>
				<article class="column-2">
					<p>
						Device(s)
					</p>
				</article>
				<article class="column-2">
					<p>
						Subtotal
					</p>
				</article>
			</section>
			<section class="checkout-product-description">
				<article class="column-1">
					<p>
						{{$pkginfo[0]->title}}
					</p>
				</article>
				<article class="column-2">
					<p>
						USD {{$pkginfo[0]->monthly_price}}
					</p>
				</article>
				<article class="column-2">
					<p>
						&nbsp;
					</p>
				</article>
				<article class="column-2">
					<p>
						1
					</p>
				</article>
				<article class="column-2">
					<p>
						{{$pkginfo[0]->monthly_price}}
					</p>
				</article> 
			</section>
<!--                   <section class="checkout-product-description">
				<article class="column-1">
					<p>
						Basic Edition Android - 1 Month License
					</p>
				</article>
				<article class="column-2">
					<p>
						USD 39.99
					</p>
				</article>
				<article class="column-2">
					<p>
						USD 10.00
					</p>
				</article>
				<article class="column-2">
					<p>
						1
					</p>
				</article>
				<article class="column-2">
					<p>
						USD 29.99
					</p>
				</article>
			</section> -->
		</figure>
		<figure id="coupon-section">
			<section class="coupon-left-section">
				<a href="#">
					I have a coupon code.
				</a>
			</section>
			<section class="coupon-right-section">
				<p>Total		USD {{$pkginfo[0]->monthly_price}}</p>
			</section>
		</figure>
	</article>
</section>
<section id="info-payment">
	<article class="container">
      <form action="{{ url('charge') }}" method="post">
	   {{ csrf_field() }}
            <input type="hidden" name="amount" value="{{$pkginfo[0]->monthly_price}}">
            <input type="hidden" name="plan_id" value="{{$pkginfo[0]->id}}">
		<figure class="info-section">
			<label class="acoount-id">
				Account ID
				<input type="text" name="account-name" value=" {{ Auth::user()->email }}" readonly="readonly" />
			</label>
			<label class="acoount-id">
				Billing Info
				    <select id="country" name="country">
       <option value="Afganistan">Afghanistan</option>
       <option value="Albania">Albania</option>
       <option value="Algeria">Algeria</option>
       <option value="American Samoa">American Samoa</option>
       <option value="Andorra">Andorra</option>
       <option value="Angola">Angola</option>
       <option value="Anguilla">Anguilla</option>
       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
       <option value="Argentina">Argentina</option>
       <option value="Armenia">Armenia</option>
       <option value="Aruba">Aruba</option>
       <option value="Australia">Australia</option>
       <option value="Austria">Austria</option>
       <option value="Azerbaijan">Azerbaijan</option>
       <option value="Bahamas">Bahamas</option>
       <option value="Bahrain">Bahrain</option>
       <option value="Bangladesh">Bangladesh</option>
       <option value="Barbados">Barbados</option>
       <option value="Belarus">Belarus</option>
       <option value="Belgium">Belgium</option>
       <option value="Belize">Belize</option>
       <option value="Benin">Benin</option>
       <option value="Bermuda">Bermuda</option>
       <option value="Bhutan">Bhutan</option>
       <option value="Bolivia">Bolivia</option>
       <option value="Bonaire">Bonaire</option>
       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
       <option value="Botswana">Botswana</option>
       <option value="Brazil">Brazil</option>
       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
       <option value="Brunei">Brunei</option>
       <option value="Bulgaria">Bulgaria</option>
       <option value="Burkina Faso">Burkina Faso</option>
       <option value="Burundi">Burundi</option>
       <option value="Cambodia">Cambodia</option>
       <option value="Cameroon">Cameroon</option>
       <option value="Canada">Canada</option>
       <option value="Canary Islands">Canary Islands</option>
       <option value="Cape Verde">Cape Verde</option>
       <option value="Cayman Islands">Cayman Islands</option>
       <option value="Central African Republic">Central African Republic</option>
       <option value="Chad">Chad</option>
       <option value="Channel Islands">Channel Islands</option>
       <option value="Chile">Chile</option>
       <option value="China">China</option>
       <option value="Christmas Island">Christmas Island</option>
       <option value="Cocos Island">Cocos Island</option>
       <option value="Colombia">Colombia</option>
       <option value="Comoros">Comoros</option>
       <option value="Congo">Congo</option>
       <option value="Cook Islands">Cook Islands</option>
       <option value="Costa Rica">Costa Rica</option>
       <option value="Cote DIvoire">Cote DIvoire</option>
       <option value="Croatia">Croatia</option>
       <option value="Cuba">Cuba</option>
       <option value="Curaco">Curacao</option>
       <option value="Cyprus">Cyprus</option>
       <option value="Czech Republic">Czech Republic</option>
       <option value="Denmark">Denmark</option>
       <option value="Djibouti">Djibouti</option>
       <option value="Dominica">Dominica</option>
       <option value="Dominican Republic">Dominican Republic</option>
       <option value="East Timor">East Timor</option>
       <option value="Ecuador">Ecuador</option>
       <option value="Egypt">Egypt</option>
       <option value="El Salvador">El Salvador</option>
       <option value="Equatorial Guinea">Equatorial Guinea</option>
       <option value="Eritrea">Eritrea</option>
       <option value="Estonia">Estonia</option>
       <option value="Ethiopia">Ethiopia</option>
       <option value="Falkland Islands">Falkland Islands</option>
       <option value="Faroe Islands">Faroe Islands</option>
       <option value="Fiji">Fiji</option>
       <option value="Finland">Finland</option>
       <option value="France">France</option>
       <option value="French Guiana">French Guiana</option>
       <option value="French Polynesia">French Polynesia</option>
       <option value="French Southern Ter">French Southern Ter</option>
       <option value="Gabon">Gabon</option>
       <option value="Gambia">Gambia</option>
       <option value="Georgia">Georgia</option>
       <option value="Germany">Germany</option>
       <option value="Ghana">Ghana</option>
       <option value="Gibraltar">Gibraltar</option>
       <option value="Great Britain">Great Britain</option>
       <option value="Greece">Greece</option>
       <option value="Greenland">Greenland</option>
       <option value="Grenada">Grenada</option>
       <option value="Guadeloupe">Guadeloupe</option>
       <option value="Guam">Guam</option>
       <option value="Guatemala">Guatemala</option>
       <option value="Guinea">Guinea</option>
       <option value="Guyana">Guyana</option>
       <option value="Haiti">Haiti</option>
       <option value="Hawaii">Hawaii</option>
       <option value="Honduras">Honduras</option>
       <option value="Hong Kong">Hong Kong</option>
       <option value="Hungary">Hungary</option>
       <option value="Iceland">Iceland</option>
       <option value="Indonesia">Indonesia</option>
       <option value="India">India</option>
       <option value="Iran">Iran</option>
       <option value="Iraq">Iraq</option>
       <option value="Ireland">Ireland</option>
       <option value="Isle of Man">Isle of Man</option>
       <option value="Israel">Israel</option>
       <option value="Italy">Italy</option>
       <option value="Jamaica">Jamaica</option>
       <option value="Japan">Japan</option>
       <option value="Jordan">Jordan</option>
       <option value="Kazakhstan">Kazakhstan</option>
       <option value="Kenya">Kenya</option>
       <option value="Kiribati">Kiribati</option>
       <option value="Korea North">Korea North</option>
       <option value="Korea Sout">Korea South</option>
       <option value="Kuwait">Kuwait</option>
       <option value="Kyrgyzstan">Kyrgyzstan</option>
       <option value="Laos">Laos</option>
       <option value="Latvia">Latvia</option>
       <option value="Lebanon">Lebanon</option>
       <option value="Lesotho">Lesotho</option>
       <option value="Liberia">Liberia</option>
       <option value="Libya">Libya</option>
       <option value="Liechtenstein">Liechtenstein</option>
       <option value="Lithuania">Lithuania</option>
       <option value="Luxembourg">Luxembourg</option>
       <option value="Macau">Macau</option>
       <option value="Macedonia">Macedonia</option>
       <option value="Madagascar">Madagascar</option>
       <option value="Malaysia">Malaysia</option>
       <option value="Malawi">Malawi</option>
       <option value="Maldives">Maldives</option>
       <option value="Mali">Mali</option>
       <option value="Malta">Malta</option>
       <option value="Marshall Islands">Marshall Islands</option>
       <option value="Martinique">Martinique</option>
       <option value="Mauritania">Mauritania</option>
       <option value="Mauritius">Mauritius</option>
       <option value="Mayotte">Mayotte</option>
       <option value="Mexico">Mexico</option>
       <option value="Midway Islands">Midway Islands</option>
       <option value="Moldova">Moldova</option>
       <option value="Monaco">Monaco</option>
       <option value="Mongolia">Mongolia</option>
       <option value="Montserrat">Montserrat</option>
       <option value="Morocco">Morocco</option>
       <option value="Mozambique">Mozambique</option>
       <option value="Myanmar">Myanmar</option>
       <option value="Nambia">Nambia</option>
       <option value="Nauru">Nauru</option>
       <option value="Nepal">Nepal</option>
       <option value="Netherland Antilles">Netherland Antilles</option>
       <option value="Netherlands">Netherlands (Holland, Europe)</option>
       <option value="Nevis">Nevis</option>
       <option value="New Caledonia">New Caledonia</option>
       <option value="New Zealand">New Zealand</option>
       <option value="Nicaragua">Nicaragua</option>
       <option value="Niger">Niger</option>
       <option value="Nigeria">Nigeria</option>
       <option value="Niue">Niue</option>
       <option value="Norfolk Island">Norfolk Island</option>
       <option value="Norway">Norway</option>
       <option value="Oman">Oman</option>
       <option value="Pakistan" selected>Pakistan</option>
       <option value="Palau Island">Palau Island</option>
       <option value="Palestine">Palestine</option>
       <option value="Panama">Panama</option>
       <option value="Papua New Guinea">Papua New Guinea</option>
       <option value="Paraguay">Paraguay</option>
       <option value="Peru">Peru</option>
       <option value="Phillipines">Philippines</option>
       <option value="Pitcairn Island">Pitcairn Island</option>
       <option value="Poland">Poland</option>
       <option value="Portugal">Portugal</option>
       <option value="Puerto Rico">Puerto Rico</option>
       <option value="Qatar">Qatar</option>
       <option value="Republic of Montenegro">Republic of Montenegro</option>
       <option value="Republic of Serbia">Republic of Serbia</option>
       <option value="Reunion">Reunion</option>
       <option value="Romania">Romania</option>
       <option value="Russia">Russia</option>
       <option value="Rwanda">Rwanda</option>
       <option value="St Barthelemy">St Barthelemy</option>
       <option value="St Eustatius">St Eustatius</option>
       <option value="St Helena">St Helena</option>
       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
       <option value="St Lucia">St Lucia</option>
       <option value="St Maarten">St Maarten</option>
       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
       <option value="Saipan">Saipan</option>
       <option value="Samoa">Samoa</option>
       <option value="Samoa American">Samoa American</option>
       <option value="San Marino">San Marino</option>
       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
       <option value="Saudi Arabia">Saudi Arabia</option>
       <option value="Senegal">Senegal</option>
       <option value="Seychelles">Seychelles</option>
       <option value="Sierra Leone">Sierra Leone</option>
       <option value="Singapore">Singapore</option>
       <option value="Slovakia">Slovakia</option>
       <option value="Slovenia">Slovenia</option>
       <option value="Solomon Islands">Solomon Islands</option>
       <option value="Somalia">Somalia</option>
       <option value="South Africa">South Africa</option>
       <option value="Spain">Spain</option>
       <option value="Sri Lanka">Sri Lanka</option>
       <option value="Sudan">Sudan</option>
       <option value="Suriname">Suriname</option>
       <option value="Swaziland">Swaziland</option>
       <option value="Sweden">Sweden</option>
       <option value="Switzerland">Switzerland</option>
       <option value="Syria">Syria</option>
       <option value="Tahiti">Tahiti</option>
       <option value="Taiwan">Taiwan</option>
       <option value="Tajikistan">Tajikistan</option>
       <option value="Tanzania">Tanzania</option>
       <option value="Thailand">Thailand</option>
       <option value="Togo">Togo</option>
       <option value="Tokelau">Tokelau</option>
       <option value="Tonga">Tonga</option>
       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
       <option value="Tunisia">Tunisia</option>
       <option value="Turkey">Turkey</option>
       <option value="Turkmenistan">Turkmenistan</option>
       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
       <option value="Tuvalu">Tuvalu</option>
       <option value="Uganda">Uganda</option>
       <option value="United Kingdom">United Kingdom</option>
       <option value="Ukraine">Ukraine</option>
       <option value="United Arab Erimates">United Arab Emirates</option>
       <option value="United States of America">United States of America</option>
       <option value="Uraguay">Uruguay</option>
       <option value="Uzbekistan">Uzbekistan</option>
       <option value="Vanuatu">Vanuatu</option>
       <option value="Vatican City State">Vatican City State</option>
       <option value="Venezuela">Venezuela</option>
       <option value="Vietnam">Vietnam</option>
       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
       <option value="Wake Island">Wake Island</option>
       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
       <option value="Yemen">Yemen</option>
       <option value="Zaire">Zaire</option>
       <option value="Zambia">Zambia</option>
       <option value="Zimbabwe">Zimbabwe</option>
    </select>
				<input type="text" name="postal_code" value="54000"/>
			</label>
		</figure>
		<figure class="payment-section">
			<p class="acoount-id">Payment Option</p>
			<img src="http://www.thewispy.com/wp-content/uploads/2020/02/check-out_03.png" />
			<input type="text" name="" placeholder="Card Number*"/>
			<input type="text" name="" placeholder="Card Holder Name*"/>
			<label class="date-section first-child-date">
				<input type="text" name="" placeholder="Card Expiration Date*" /> 
			</label>
			<label class="date-section">
				<input type="text" name="" placeholder="CVV2 Code*" /> 
			</label>
			<section class="checkbox-section">
				<p><input type="checkbox" name="" />Enable auto-renewal for this order.</p>
				<p><input type="checkbox" name="terms" required="required"/>By placing this order I agree to the Terms of Use, Privacy Policy and End User License Agreement (EULA).</p>
				<p><input type="checkbox" name="terms2" required="required" />I realize that I will need physical access to the target device in some cases.</p>

			</section>
			<!-- <a href="#" class="anchor-btn">Secure Checkout</a> -->
                  <input type="submit" name="payintegration" class="anchor-btn" value="Secure Checkout">
		</figure>
        </form>
	</article>
</section>
@endsection