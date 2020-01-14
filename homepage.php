
<?php
  /*
  Template Name: Home Page
  */
  // get_header();
 if(!is_user_logged_in()){
//    wp_redirect( get_home_url()."/log-in" );
  }
?>

<?php
$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
if($_REQUEST['fullname']){
  $subject = "Message. With best regards from Us!";
  $headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message .= "<html><body><center>
                <table border='0'>";   
    $message .="<tr>";
    $message .="<td style='height:5px; width:600px; font-family:'Nirmala UI'; font-size:18px;'>
                     Name         : ".$_REQUEST['fullname']." <br/>
                     Email        : ".$_REQUEST['email']."<br/>  
                     Phone Number : ".$_REQUEST['phonenumber']."<br/>
                     Address      : ".$_REQUEST['address']."<br/>
                     Message      : ".$_REQUEST['message']."<br/>
                    </td>";
    $message .="</tr><br/>";
    $message .="</table>";
    $message .="</center></body></html>";   
    
    $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <carefinder@service.com>' . "\r\n";
  // $mlresult = mail( get_option('admin_email') , $subject, $message, $headers );
 $mlresult = mail( "datalogicinc19@gmail.com" , $subject, $message, $headers );
  if ( $mlresult ) {
 //  	 echo "<div class=\"mlRcvd1\"><div class=\"mlRcvd\">Email Received</div></div>";
  } else {
 //    echo "<div class=\"mlRcvd\">Sorry, Email not Received</div>"; 
  } 
}   
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css">
    <title>Care</title>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl/owl.theme.default.min.css">
</head>

<body>
<nav class="navbar navbar-expand-md" id="header_nav">
    <div class="container-fluid w-90">
        <a class="navbar-brand" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/menu.svg" alt="menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url() ?>">HOME<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#AboutSection">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ContactSection">CONTACT US</a>
                </li>
<!--				<li class="nav-item">
                    <a class="nav-link" href="<?php echo wp_logout_url( home_url() ); ?>">LOGOUT</a>
                </li>  -->
            </ul>

        </div>
        <ul class="navbar-nav mr-auto signup-google">
            <li class="nav-item">
                <a class="nav-link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="g-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/google-icon.svg" width="32px"></span><span class="g-text">DOWNLOAD APP</span></a>
            </li>
        </ul>
    </div>
</nav>

<!-- section_search start -->
<section class="section-search position-relative">
    <div class="container-fluid w-90">
        <div class="row">
            <div class="col-md-12">
                <div class="select-main">
                    <div class="select-main-inner">
                        <div class="input-group mt-3 mb-3">
                            <div class="custom-selectbox">
                                <select id="category">
    								<option value="-1">Nothing Selected</option>
                                    <option value="0">Dialysis Facilities</option>
                                    <option value="1">Home Health Care</option>
                                    <option value="2">Hospices</option>
    								<option value="4">Inpatient Rehab</option>
                                    <option value="6">Nursing Homes</option>
                                </select>
                            </div>
                            <div class="input-main">
                                <input type="text" class="form-control" id="search_address" name="search_address"
                                       placeholder="Enter Address /  Zipcode to find Service Provider" autocomplete="on" runat="server">
    							<a class="gps" id="gps"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/gps.svg"></a>
                            </div>
                            <div class="search-provider">
                                <button class="btn search-btn" id="searchButton" type="button">SEARCH PROVIDER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_search end -->

<!-- section_map start -->
<section class="section-map position-relative">
    <div class="container-fluid w-90">
        <div class="row">
            <div class="col-12">
                <div class="map-main" id="map" style="height:400px">
                        
                </div>
    			<div class="loader"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="slider-main">
                    <button type="button" class="btn close-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/cancel.svg" alt="cancel"></button>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_map end -->

<!-- section_about_us start -->
<section class="section-aboutus position-relative" id="AboutSection">
    <div class="container-fluid w-90">
        <div class="row">
            <div class="col-md-12">
                <div class="aboutus-main">
                    <h2>About Us</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_about_us start -->

<!-- section_faq start -->
<section class="section-faq position-relative">
    <div class="container-fluid w-90">
        <div class="row">
            <div class="col-md-12">
                <div class="faq-main">
                    <h2>FAQs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="faq-main">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="heading-1">
                                <h5 class="mb-0">
                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        FAQs1
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-2">
                                <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                        FAQs2
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-3">
                                <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                        FAQs3
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-4">
                                <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                        FAQs4
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-4" class="collapse" data-parent="#accordion" aria-labelledby="heading-4">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-5">
                                <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                        FAQs5
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-5" class="collapse" data-parent="#accordion" aria-labelledby="heading-5">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_faq start -->

<!-- section_footer start -->
<section class="section-footer position-relative" id="ContactSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-main">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-main">
                    <form id="form_contact" method="GET" action="<?php  echo $current_url?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.svg" alt="user"></span>
                                    <input type="text" class="form-control user-name" id="username" aria-describedby="user_name"
                                           placeholder="User Name" name="fullname">
                                    <p class="error_msg">This field is Required</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/mail.svg" alt="mail"></span>
                                    <input type="email" class="form-control" id="emailid" aria-describedby="emailHelp"
                                           placeholder="Email Id" name="email">
                                    <p class="error_msg">This field is Required</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/mobile.svg" alt="mobile"></span>
                                    <input type="text" class="form-control" id="" aria-describedby="phonenumber"
                                           placeholder="Phone Number" name="phonenumber">
                                    <p class="error_msg">This field is Required</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/zip.svg" alt="zip"></span>
                                    <input type="text" class="form-control zipcode" id="address" aria-describedby="emailHelp"
                                           placeholder="Address / Zipcode" name="address">
                                    <p class="error_msg">This field is Required</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/msg.svg" alt="message"></span>
                                    <input type="text" class="form-control" id="address1" aria-describedby="emailHelp"
                                           placeholder="Message" name="message">
                                    <p class="error_msg">This field is Required</p>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                    <button type="button" id="SendMsg" class="btn btn-send">SEND</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_footer start -->

<!-- section_final_footer start -->
<section class="section-f-footer position-relative">
    <div class="container-fluid w-90">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="footer-menu">
                    <ul class="list-unstyled">
                        <li><a href="">HOME</a></li>
                        <li><a href="#AboutSection">ABOUT</a></li>
                        <li><a href="#ContactSection">CONTACT US</a></li>
                        <li><a href="<?php echo site_url().'/teamsandconditions/' ?>">TERMS & CONDITIONS</a></li>
                        <li><a href="<?php echo site_url().'/privacypolicy/' ?>">PRIVACY POLICY</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="copy-right">
                    <p>+1 235 125 1236 <span> | <a href="">service@careprovider.com</a> </span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section_final_footer end -->
<div class="modal fade" id="myModal" role="dialog" style="opacity: 1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Download App</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
          <a target="blank" href="https://www.google.com/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/apple-download.png" style="width: 45%; float: left"></a>
          <a target="blank" href="https://www.google.com/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/android-download.png" style="width: 45%; float: right"></a>

        </div>
        <div class="modal-footer">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/js/popper.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/js/bootstrap.min.js"></script>
<!-- Owl_carousal_js start -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl/owl.carousel.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOrCCRMCvWmJNzpy28Wog594HJY8o0X8A&libraries=places"></script>           
<script>
  $('.loader').hide();
  var zipCode = '';
  var locations = [];
  var addresses = [];
  function initialize() {
    var input = document.getElementById('search_address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    len = place.address_components.length;
    console.log(place);
    for(var i =0; i<len; i++)
    {
    	if(place.address_components[i].types[0] == "postal_code")
        {
            zipCode = place.address_components[i].long_name;
            // alert(zipCode)
        }else{
        	zipCode = 0;
        }
    }
  });
  }
  $(document).ready(function(){
      $('#myModal').fadeIn();
  // Add smooth scrolling to all links
    $("a.nav-link").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });

   $('.close').click(function(){
    // $('#myModal').attr('style','opacity:0');
    $('#myModal').fadeOut();
  })
  $('#SendMsg').click(function(){
    var i = 0;
    $('#form_contact input').each(function(){
      if($(this).val())
      {
        i++;
        $(this).next().hide()
      }else{
        $(this).next().show()
      }
    });
    if(i == 5){
    	$('#form_contact').submit();
    }
    
  })
  $('#searchButton').click(function(){
      locations = [];
      addresses = [];
      $('.loader').show();
      $('.slider-main').html('<div class="loop owl-carousel owl-theme providers"></div>')
      $(".mapFrame").attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=' + $('#search_address').val());
      tableNo = $('select#category').val();
      url = 'http://51.81.240.252/provider.php?zipcode='+ zipCode +'&distance=4&tableno=' + tableNo;
      $.get(url, function(data){
        console.log(JSON.parse(data).error);
        if(JSON.parse(data).error)
        {
        	// alert(JSON.parse(data).error)
            addresses = [{name: "My position", address: $('#search_address').val()}];
            alert("There isn't any providers near you");
            GeoCode(addresses, 0);
        }else
        {
           var array = $.map(JSON.parse(data).data, function(value, index){
                return [value];
            });
          console.log("data",array);
          var list_provider = array[0];
          var address = "";
          for(var i=0; i<list_provider.length; i++)
          {
            if( tableNo == 6){
                name = list_provider[i]["Provider_Name"];
            	address = list_provider[i]["Provider_Address"]+', '+list_provider[i]["Provider_City"]+', '+list_provider[i]["Provider_State"]+', '+list_provider[i]["Provider_zip_Code"];
                var provider = '<div class="item"><div class="user-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></div><div class="user-details"><h3>'+list_provider[i]["Provider_Name"]+'<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/heart.svg" alt="heart"></span></h3><h4>'+list_provider[i]["Provider_Address"]+', '+list_provider[i]["Provider_City"]+', '+list_provider[i]["Provider_State"]+', '+list_provider[i]["Provider_zip_Code"]+'</h4><h5>3 mi away</h5><hr><div class="more-user"><ul><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li></ul></div></div></div>';
            }else if(tableNo == 1){
                name = list_provider[i]["Provider_Name"];
                address = list_provider[i]["Address"]+', '+list_provider[i]["City"]+', '+list_provider[i]["State"]+', '+list_provider[i]["Zip"];
                var provider = '<div class="item"><div class="user-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></div><div class="user-details"><h3>'+list_provider[i]["Provider_Name"]+'<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/heart.svg" alt="heart"></span></h3><h4>'+list_provider[i]["Address"]+', '+list_provider[i]["City"]+', '+list_provider[i]["State"]+', '+list_provider[i]["Zip"]+'</h4><h5>3 mi away</h5><hr><div class="more-user"><ul><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li></ul></div></div></div>';
            }else{
                name = list_provider[i]["Facility_Name"];
                address = list_provider[i]["Address_Line_1"]+', '+list_provider[i]["Address_Line_2"]+', '+list_provider[i]["City"]+', '+list_provider[i]["State"]+', '+list_provider[i]["Zip"];
                var provider = '<div class="item"><div class="user-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></div><div class="user-details"><h3>'+list_provider[i]["Facility_Name"]+'<span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/heart.svg" alt="heart"></span></h3><h4>'+list_provider[i]["Address_Line_1"]+', '+list_provider[i]["Address_Line_2"]+', '+list_provider[i]["City"]+', '+list_provider[i]["State"]+', '+list_provider[i]["Zip"] +'</h4><h5>3 mi away</h5><hr><div class="more-user"><ul><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li><li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/user.png" alt="user"></li></ul></div></div></div>';
            }
            arr_address = {name: name, address: address};
            addresses.push(arr_address);
            console.log(addresses);
            $('.providers').append(provider); 
          }
          $('.owl-carousel').owlCarousel({
            stagePadding: 50,
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            control: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                },
                1366: {
                    items: 4
                }
            }
          })
           GeoCode(addresses,0);
        }
    })
  })
  $("#gps").click(function(){
    	tryGeolocation();
    })

function GeoCode(adr, no){
    console.log(no,adr[no]);
    var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address': adr[no].address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    var location = {address: adr[no].name, latitude: latitude, longitude: longitude, order: no+1};
                    locations.push(location);
                    if(no<adr.length-1){
                        console.log("length",adr.length);
                        console.log("no", no)
                        no++;
                        GeoCode(adr, no);
                    }else{
                        console.log(locations)
                        makerMap(locations)
                    }
                }
            });
}
function makerMap(locations_provider){
    var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 11,
                    center: new google.maps.LatLng(locations_provider[0].latitude, locations_provider[0].longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
               	});

             var infowindow = new google.maps.InfoWindow();

             var marker, index;

             for (index = 0; index < locations_provider.length; index++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations_provider[index].latitude, locations_provider[index].longitude),
                    icon: "<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/marker.png",
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, index) {
                    return function() {
                        infowindow.setContent(locations_provider[index].address);
                        infowindow.open(map, marker);
                    }
                })(marker, index));
            }
    $('.loader').hide();
}

var apiGeolocationSuccess = function(position) {
 		latitude=position.coords.latitude;
        longitude=position.coords.longitude;
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(latitude, longitude);

        if (geocoder) {
            geocoder.geocode({ 'latLng': latLng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                console.log(results[0]); 
                $('#search_address').val(results[0].formatted_address);
                    for(var i =0; i<results[0].length; i++)
                    {
                        if(results[0].address_components[i].types[0] == "postal_code")
                        {
                            zipCode = results[0].address_components[i].long_name;
                            // alert(zipCode)
                        }
                    }
                $(".mapFrame").attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=' + $('#search_address').val());
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: new google.maps.LatLng(latitude, longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                for (i = 0; i < 1; i++) {
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    icon: "<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/marker.png",
                    map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                        infowindow.setContent("My Position");
                        infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            else {
                $('#search_address').val('');
                console.log("Geocoding failed: " + status);
            }
            });
        }      
};

var tryAPIGeolocation = function() {
    jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyDOrCCRMCvWmJNzpy28Wog594HJY8o0X8A", function(success) {
        apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
    })
        .fail(function(err) {
            alert("API Geolocation error! \n\n"+err);
        });
};

var browserGeolocationSuccess = function(position) {
    	latitude=position.coords.latitude;
        longitude=position.coords.longitude;
        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(latitude, longitude);
        if (geocoder) {
            geocoder.geocode({ 'latLng': latLng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                console.log("ad".results[0]); 
                $('#search_address').val(results[0].formatted_address);
                $(".mapFrame").attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=' + $('#search_address').val());
                console.log(latitude)
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: new google.maps.LatLng(latitude, longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                for (i = 0; i < 1; i++) {
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    icon: "<?php echo get_stylesheet_directory_uri(); ?>/assets/images/FrontPage/marker.png",
                    map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                        infowindow.setContent("My Position");
                        infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

             }else 
            {
                  $('#search_address').val('');
                        console.log("Geocoding failed: " + status);
            }
         });
     }      
};

var browserGeolocationFail = function(error) {
    switch (error.code) {
        case error.TIMEOUT:
            alert("Browser geolocation error !\n\nTimeout.");
            break;
        case error.PERMISSION_DENIED:
            if(error.message.indexOf("Only secure origins are allowed") == 0) {
                tryAPIGeolocation();
            }
            break;
        case error.POSITION_UNAVAILABLE:
            // dirty hack for safari
            if(error.message.indexOf("Origin does not have permission to use Geolocation service") == 0) {
                tryAPIGeolocation();
            } else {
                alert("Browser geolocation error !\n\nPosition unavailable.");
            }
            break;
    }
};

var tryGeolocation = function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            browserGeolocationSuccess,
            browserGeolocationFail,
            {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
    }
};

tryGeolocation();
google.maps.event.addDomListener(window, 'load', initialize);


</script>
<!-- Owl_carousal_js end -->
</body>
</html>

<?php//  get_sidebar(); ?>
<?php // get_footer(); ?>