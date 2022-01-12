@extends('layouts.register_agent')
@section('pageTitle', 'Affiliate Signup')

@section('styles')

<style type="text/css">
    .affiliate-box {
    /* padding: 0 15px; */
    overflow: hidden;
    border: none;
    min-height: 510px;
    margin-top: 100px;
    box-shadow: 0 0 15px 0 rgb(153 153 153 / 40%);
    padding: 24px 36px 17px 34px;
}
.page-header.title {
    margin: 15px 0 12px;
    border-bottom: 1px solid #e5e5e5;
    color: #414141;
    padding: 15px;
    background-color: #ffffff;
}
.portlet {
    margin-bottom: 15px;
    border: 1px solid #e5e5e5;
    background: #ffffff;
}
.portlet .portlet-body {
    background: #ffffff;
    padding: 15px;
}
.affiliate-btn {
    padding: 4px 30px;
    background: #ec008c;
    margin-top: 5px;
    margin-left:10px;
    color: #fff;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
    border: 1px solid #ec008c;
    border-radius: 4px;
}
.affiliate-form-heading h4 {    color: #fff;}
.affiliate-form-heading{
padding: 5px 15px;
border-bottom: 1px solid #e5e5e5;
background: #ee007e;
line-height: 38px;
min-height: 39px;}
.affiliate-form-body {
    margin-bottom: 15px;
    border: 1px solid #e5e5e5;
}
.form-group.row.affiliate {
    margin: 1rem;
}
.col-md-12.affiliate {
    text-align: center;
}
.affiliate-form-body.ending {
    border: none;
    margin-top: 40px;
}
// workaround
.intl-tel-input {
  display: table-cell;
}
.intl-tel-input .selected-flag {
  z-index: 4;
}
.intl-tel-input .country-list {
  z-index: 5;
}
.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}

.invalid_feedback2{
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>



@endsection




@section('content')
<section class="container">
    <section class="affiliate-box">
        <div class="page-header title"><h1>Welcome To Affiliate</h1></div>
    
            <div class="portlet portlet-basic">
                <div class="portlet-body">
                    <p>
                        Join our affiliate program and start earning money for every sale you send our way!Simply create your account, place your linking code into your website and watch your account balance grow as your visitors become our customers.
                    </p>
                </div>
            </div>
     <section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>Create Your Account</h4>
</section>


<form method="POST" action="{{ route('affiliate-register') }}">
    @csrf
<section class="affiliate-form-body">
<div class="form-group row affiliate">

                            <div class="col-md-12">
                                <label>Name:</label>
                                <input id="name" type="text" class="form-control " name="name" value="" placeholder="Name">
             @error('name')
                                    <span class="invalid_feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                                               
                        </div>

                                               
                        

                        <div class="form-group row affiliate">

                            <div class="col-md-12">
                                <label>Email Address</label>
                                <input id="email" type="email" class="form-control " name="email" value="" autocomplete="email" placeholder="Email Address">
                                 @error('email')
                                    <span class="invalid_feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                     
                        </div>
                       <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Password:</label>
                                <input id="password" type="password" class="form-control " name="password" autocomplete="new-password" placeholder="Password">
                                
                                @error('password')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                              
                        </div> 
                        <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Confirm Password:</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        </section>
                        </section>


                    <section class="affiliate-form">
    
                    <section class="affiliate-form-heading"> 
                <h4>Standard Information</h4>
</section>
<section class="affiliate-form-body">

                       <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Company Name:</label>
                                <input id="company-name" type="text" class="form-control " name="company_name" placeholder="Company Name">

                                                            </div>
                        </div> 
       
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Website Address To</label>
                                <input type="text" class="form-control" name="company_website" value="https://" id="url">
                                </div>
                        </div> 
           
                        </section>
                        </section>


                         <section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>Personal Information</h4>
</section>
<section class="affiliate-form-body">

            
                         <div class="form-group row affiliate">
                          <div class="col-md-12">
                                <label>Street Address:</label>
                                <input id="name" type="text" class="form-control " name="street_address" value="">
        @error('street_address')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                                    </div>
                            <div class="form-group row affiliate">
                          <div class="col-md-12">
                                <label>Additional Address:</label>
                                <input id="name" type="text" class="form-control " name="additional_address" value="">
    @error('additional_address ')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                                                            </div>
                     <div class="form-group row affiliate">
                          <div class="col-md-12">
                                <label>City:</label>
                                <input id="name" type="text" class="form-control " name="city" value="">
    @error('city')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div> 
                                                            </div> 
         
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>State or Province:</label>
                                <input id="tax-id" type="text" class="form-control " name="state">
    @error('state')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                        </div>
                         <div class="form-group row affiliate">
                            <div class="col-md-12" for="myform_phone">
                                     <p>Enter your phone number:</p>
                                         
                                         <input id="txtNumber" type="tel" name="phone_number" placeholder="123-456-7891 Enter With Dashes" class="form-control"id="myform_phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
                                    

                        </div>
                        </div> 
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                               <label>Zip Code:</label>
                                <input id="zip-id" type="text" class="form-control" name="zip_code">
    @error('zip_code')
                                    <span class="invalid-feedback2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                            </div>
                        </div>
                          <div class="form-group row affiliate">
                            <div class="col-md-12">
                               <label>Country:</label>
                               <select class="form-control" name="country">
                                    <option value="AFG">Afghanistan</option>
<option value="ALA">Åland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATA">Antarctica</option>
<option value="ATG">Antigua and Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia, Plurinational State of</option>
<option value="BES">Bonaire, Sint Eustatius and Saba</option>
<option value="BIH">Bosnia and Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BVT">Bouvet Island</option>
<option value="BRA">Brazil</option>
<option value="IOT">British Indian Ocean Territory</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="CXR">Christmas Island</option>
<option value="CCK">Cocos (Keeling) Islands</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, the Democratic Republic of the</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Côte d'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CUW">Curaçao</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FRO">Faroe Islands</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="PYF">French Polynesia</option>
<option value="ATF">French Southern Territories</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GGY">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="HMD">Heard Island and McDonald Islands</option> 
<option value="VAT">Holy See (Vatican City State)</option> 
<option value="HND">Honduras</option> 
<option value="HKG">Hong Kong</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="IMN">Isle of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="JEY">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="PRK">Korea, Democratic People's Republic of</option>
<option value="KOR">Korea, Republic of</option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Lao People's Democratic Republic</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao</option>
<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MTQ">Martinique</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Federated States of</option>
<option value="MDA">Moldova, Republic of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MNE">Montenegro</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PSE">Palestinian Territory, Occupied</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="REU">Réunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="BLM">Saint Barthélemy</option>
<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
<option value="KNA">Saint Kitts and Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="MAF">Saint Martin (French part)</option>
<option value="SPM">Saint Pierre and Miquelon</option>
<option value="VCT">Saint Vincent and the Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome and Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SRB">Serbia</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SXM">Sint Maarten (Dutch part)</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="SGS">South Georgia and the South Sandwich Islands</option>
<option value="SSD">South Sudan</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard and Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TWN">Taiwan, Province of China</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Republic of</option>
<option value="THA">Thailand</option>
<option value="TLS">Timor-Leste</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad and Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks and Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="USA" selected="selected">United States</option>
<option value="UMI">United States Minor Outlying Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VEN">Venezuela, Bolivarian Republic of</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British</option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis and Futuna</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>

                                </select>


                                                            </div>
                        </div> 
                        </section>
                        </section>


   <section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>PayPal Account</h4>
</section>
<section class="affiliate-form-body">
<div class="form-group row affiliate">

<!--                         <div class="col-md-12">
                                <label>Payment Method:</label>
                                    <select class="form-control" name="payment_method">
                                    <option value="PayPal">PayPal</option></select>
                        </div> -->
                        </div>
                        <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Paypal Account Email</label>
                                <input id="paypal-email" type="text" class="form-control" name="paypal_account" placeholder="PayPal Account">
                            </div>
                        </div>
                        </section>
                        </section>
<section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>Bank Details</h4>
</section>
<section class="affiliate-form-body">

                        <div class="form-group row affiliate">
                            <div class="col-md-12">
                               <label>Bank Name</label>
                                <input id="Bank-name" type="text" class="form-control" name="bank_name" placeholder="Bank Name">
                                                                </div>
                        </div>
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                               <label>Bank Account Title</label>
                                <input id="bank-account-title" type="text" class="form-control" name="bank_ac_title" placeholder="Account Title">
                                                                </div>
                        </div>
                        <div class="form-group row affiliate">
                            <div class="col-md-12">
                               <label>IBAN</label>
                                <input id="bank-IBAN" type="text" class="form-control" name="bank_iban" placeholder="IBAN Number">
                                                                </div>
                        </div>
                        </section>
                        </section>
   <section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>Terms and Conditions</h4>
</section>
<section class="affiliate-form-body">

                       <div class="form-group row affiliate">
                            <div class="col-md-12" style="background: #d3d3d352; padding: 10px ;height: 350px;overflow-y: auto;">
                               <!-- <textarea class="form-control" rows="10" readonly=""> -->

                                <h3>Sign Up Page - TheWiSpy Affiliate Program</h3>

                                <p>Join TheWiSpy affiliate program and grow your bank balance by making money through
every sale you generate. Create an affiliate account, place our linking banners and texts
on your website and earn profits whenever your web visitors convert into our customers.</p>


                                <h3>Terms & Conditions:</h3>
                                <p>o get started with TheWiSpy.com affiliate program, you are required to acknowledge
and abide by the terms and conditions (hereinafter T&C) stated in this document.
Please carefully read the T&C of TheWiSpy’s affiliate program to understand the rules
and regulations in detail. Make sure that you thoroughly read this document before
signing up with the TWS affiliate program. While registering for TheWiSpy.com affiliate
program, you show your consent to accept the T&C cited in this agreement.
Be noted that T&C mentioned in this agreement are not all-inclusive; TheWiSpy can
change the T&C in accordance with laws, marketing campaigns, and other obligations. 
Thereby, we propose that you check back all the clauses mentioned in this affiliate
program T&C document. TheWiSpy will inform all its affiliates in case there are any
alterations made in this agreement.</p>


                                 <h3>Payments:</h3>
                                <p>New affiliates of TheWiSpy.com will be eligible to collect payment immediately after
making $400. The minimum payout limit is $400, and there is a 4-week period of
retention for each payout.</p>


                                 <h3>Payments Cycle:</h3>
                                <p>TheWiSpy releases payment to its affiliates on a monthly basis.</p>

                                <h3>Payment Methods:</h3>
                                <p>TheWiSpy affiliates can receive payments through the following payout methods.<br>
● Wire Transfer<br>
We will add new payout methods as soon as they become available.</p>

<h3>Rules, Policies, and Limitations concerning Affiliate Content:</h3>
<p><strong>Creativity - </strong>You can be as innovative as you want with your content, but make sure you
stay genuine and don’t overstate something TheWiSpy can not do or offer.
We provide our affiliate management services to all our affiliates. In case you have any
uncertainties or concerns, you can discuss with your affiliate supervisor. You can also
lookup for details from TheWiSpy.com features’ page.</p>



<h3>PPC Campaigns:</h3>
<p>We advise you not to use SEM bidding keywords such as THEWISPY, The WiSpy, The
Wi Spy, Wispy, thewispy.com, etc., in any circumstances. Also, verify that you negative-
match   these   keywords   in   your   PPC   campaign.   The   match   type   is   preferably
broad/equivalent. </p>

<h3>SEO Rules:</h3>
<p>You can utilize search engine optimization, but you need to follow the rules mentioned
below precisely.<br>
Avoid brand-oriented optimization. Do not optimize your web pages to TheWiSpy brand
keywords. The reason for that is, if you use TheWiSpy brand keywords in your content,
your content will clash with ours, and all our SEO efforts will go in vain. Furthermore,
make sure that your SEO actions will not be deleterious to the affiliate program of
TheWiSpy. Against any harmful activity, TheWiSpy will promptly terminate your affiliate
account.<br>
If an affiliate marketer uses or sets up a domain name contingent on existing, TheWiSpy
will be banned from the affiliate program.</p>
<h3>Content Rules:</h3>
<p>Note that we do not appreciate you mentioning any details that are not authentic about
TheWiSpy app. Make sure you use truthful information regarding TheWiSpy services
and products. Any exaggerated information that may negatively affect the reputation of
TheWiSpy would cause more loss than benefit to the affiliates.<br> 
For example, affiliates must precisely use information such as; “limited time offer”, “sale
expiry date”, “free demo”, “return policy expiry”, etc. <br>
Please ensure that you cite the below-mentioned disclaimer at the bottom of your
affiliate article/post.</p>

<h3>Disclaimer:</h3>
<p>TheWiSpy software is designed for kids’ monitoring, parental control, and employee
surveillance. No other usage of TheWiSpy is endorsed.TheWiSpy strictly discourages
the use of the app in any illegal manner and is not liable for its customers' illicit use of
the spyware. </p>


<h3>Traffic Generation Methods:</h3>

<p>Be noted that automated links are not allowed to be used on your website for TheWiSpy
affiliate program. As a website owner, you are required to give your content not to use
any link that can be opened automatically without the visitor clicking on it. <br>
The following traffic generation methods are also forbidden:<br>
● Drive-by downloads.<br>
● Pop-unders.<br>
● Spam pop-ups.<br>
● Cashback or incentive-based traffic is also not allowed.<br>
</p>
<h3>Coupon Websites:</h3>
<p>
TheWiSpy   affiliate   program   does   not   support   coupon   websites.   However,   if   you
consider your website an excellent fit for our affiliate program, please specify the
reasons and identify your website attributes in your affiliate application. 
</p>

<h3>Website Eligibility:</h3>
<p>Most websites are eligible for our affiliate program, but we do not accept websites that
contain the following contradictory points:<br>
● Sexually explicit content.<br>
● Offensive content promoting hate, violence, etc.<br>
● Discriminative content based on religion, race, gender, age, nationality, disability,
etc.<br>
● Illegal websites that target WARES, HACKING, CRACKING, SPAM, etc.<br><br>
Note that if your website violates the requirements above-mentioned (at any time),
TheWiSpy reserves the right to terminate your affiliate account with no prior notification.
</p>
<!-- </textarea> -->
</div>
<div class="col-md-12">
                        <input type="checkbox" class="myCheck" value="1">
                        <span style="color: #CC0000;">*</span>
                        I have read, understand and agree to the above terms and conditions.
                    </div>

                                                            
                        </div> 

                        </section>
                        </section>


   <!-- <section class="affiliate-form">
     <section class="affiliate-form-heading"> 
        <h4>User Defined Fields</h4>
</section>
<section class="affiliate-form-body">

                       <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Name On Account </label>
                                <input id="account-name" type="text" class="form-control " name="account">

                                                            </div>
                        </div> 
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>IBAN</label>
                                <input id="iban" type="text" class="form-control " name="iban">

                                                            </div>
                        </div> 
        
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Bank Name</label>
                                <input id="b-name" type="text" class="form-control " name="b-name">

                                                            </div>
                        </div>
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Bank Account No</label>
                                <input id="b-number" type="text" class="form-control " name="b-number">

                                                            </div>
                        </div>
                         <div class="form-group row affiliate">
                            <div class="col-md-12">
                                <label>Swift Code </label>
                                <input id="s-code" type="text" class="form-control " name="s-code">

                                                            </div>
                        </div> 
                        </section>
                        </section> -->

<section class="affiliate-form-body ending">

<div class="col-md-12 affiliate">
                                <button type="submit" class="affiliate-btn" disabled="disabled">
                                    Submit
                                </button>
                            </div>
                       
                        </section>



</form>













                    </section>
</section>
</section>
@endsection



@section('scripts')

<script>
//   const phoneInputField = document.querySelector("#phone");
 //  const phoneInput = window.intlTelInput(phoneInputField, {
   //  utilsScript:
     //  "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   //});


 const check = document.querySelector('.myCheck');

 const affiliateBtn = document.querySelector('.affiliate-btn');
  

 check.addEventListener('click', function(){
       

        affiliateBtn.removeAttribute('disabled');
         
 });

 </script>


<script>
var phone_input = document.getElementById("myform_phone");

phone_input.addEventListener('input', () => {
  phone_input.setCustomValidity('');
  phone_input.checkValidity();
});

phone_input.addEventListener('invalid', () => {
  if(phone_input.value === '') {
    phone_input.setCustomValidity('Enter phone number!');
  } else {
    phone_input.setCustomValidity('Enter phone number in this format: 123-456-7890');
  }
});
</script>

@endsection