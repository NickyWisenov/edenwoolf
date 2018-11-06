<link href="/frontend/custom/css/materialize.css" rel="stylesheet">
<link href="/frontend/custom/EasyAutocomplete-1.3.5/easy-autocomplete.min.css" rel="stylesheet">
<link href="/frontend/custom/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css" rel="stylesheet">
<link href="/assets/b9403da1/css/bootstrap.css" rel="stylesheet">
<link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
<link href="/frontend/css/font-awesome.min.css" rel="stylesheet">
<link href="/frontend/css/bootstrap-select.css" rel="stylesheet">
<link href="/frontend/css/bootstrap_select2/select2.min.css" rel="stylesheet">
<link href="/frontend/css/bootstrap_select2/select2-bootstrap.css" rel="stylesheet">
<link href="/frontend/css/animate.css" rel="stylesheet">
<link href="/frontend/css/all-pages.css" rel="stylesheet">
<link href="/frontend/css/main.css" rel="stylesheet">
<link href="/frontend/css/responsive.css" rel="stylesheet">
<link href="/frontend/css/animate.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&amp;amp;subset=latin-ext" rel="stylesheet">
<link href="/frontend/custom/css/style.css" rel="stylesheet">
<link href="/frontend/custom/datepicker/bootstrap-datepicker.css" rel="stylesheet">
<link href="/frontend/custom/css/jquery.datetimepicker.css" rel="stylesheet">
<link href="/frontend/custom/css/jquery.timepicker.css" rel="stylesheet">
<link href="/frontend/custom/notie-master/notie.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/web/frontend/whole_chat/static/css/sample-chat.css">
<script src="/frontend/js/jquery-2.2.4.min.js"></script>
<script src="/frontend/js/jquery-ui.min.js"></script>        <link rel="shortcut icon" href="/favicon.ico">

 <script src="/frontend/custom/datepicker/bootstrap-datepicker.js"></script>
<script src="/frontend/custom/js/jquery.datetimepicker.full.js"></script>
<script src="/frontend/custom/js/jquery.timepicker.js"></script>
<script src="/frontend/custom/js/jquery.cookie.js"></script>
 
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\controllers\FrontController;
use yii\web\Controller;
use app\models\Seo;
use app\models\Email;
use app\models\UserMaster;
use app\models\JobDescription;
require_once(Yii::$app->basePath.'/views/partials/header.php');


/*print_r(Yii::$app->basePath.'/views/partials/header.php'); die;*/
 ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">  
  
   <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> -->
  <!--<script src="/web/frontend/js/bootstrap.min.js"></script>
  <script src="/web/frontend/js/main.js"></script>
  <script src="/web/frontend/js/bootstrap-select.js"></script>
  <script src="/web/frontend/js/jquery.nicescroll.js"></script>
  <script src="/web/frontend/css/bootstrap_select2/select2.full.js"></script>
  <script src="/web/frontend/custom/js/global.js"></script>
  <script src="/web/frontend/custom/js/carer_search.js"></script>
  <script src="/web/frontend/custom/js/family_search.js"></script>
  <script src="/web/frontend/custom/js/family.js"></script>
  <script src="/web/frontend/custom/datepicker/bootstrap-datepicker.js"></script>
  <script src="/web/frontend/custom/js/jquery.datetimepicker.full.js"></script>


  <link rel="stylesheet" href="/web/frontend/css/main.css">
  <link rel="stylesheet" href="/web/frontend/css/flexslider.css">
  <link rel="stylesheet" href="/web/frontend/css/full-slider.css">
  <link rel="stylesheet" href="/web/frontend/css/responsive.css">
  <link rel="stylesheet" href="/web/frontend/css/select2.min.css">  
  <link rel="stylesheet" href="/web/frontend/css/font-awesome.min.css">
  <link rel="stylesheet" href="/web/frontend/css/bootstrap-select.css"> 
  <link rel="stylesheet" href="/web/frontend/css/bootstrap_select2/select2.min.css"> 
  <link rel="stylesheet" href="/web/frontend/css/bootstrap_select2/select2-bootstrap.css"> 
  <link rel="stylesheet" href="/web/frontend/css/animate.css"> 
  <link rel="stylesheet" href="/web/frontend/css/all-pages.css">  -->


 
 <!--  <link rel="stylesheet" href="/web/frontend/css/animate.css"> 
  <link rel="stylesheet" href="/web/frontend/css/animate.css"> 
  <link rel="stylesheet" href="/web/frontend/css/animate.css"> 
  <link rel="stylesheet" href="/web/frontend/css/animate.css">  --> 
  <!-- <script type="text/javascript">
  // Let the library know where WebSocketMain.swf is:
  window.WEB_SOCKET_SWF_LOCATION = "static/lib/WebSocketMain.swf";  
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xdomain/0.7.5/xdomain.js"></script>
  <script>
    xdomain.slaves({
      "https://api-us-1.sendbird.com": "/xdomain.html",
      "https://api-p.sendbird.com": "/xdomain.html"
    });
  </script>
  <script src="/web/frontend/static/lib/swfobject.js"></script>
  <script src="/web/frontend/static/lib/web_socket.js"></script>
  <script src="/web/frontend/static/lib/moxie.js"></script>
  <script>moxie.core.utils.Env.swf_url = 'static/lib/Moxie.min.swf';</script> -->
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,500,500i,600,600i,700,700i&amp;amp;subset=latin-ext" rel="stylesheet">
  <title>Chat-Eden Woolf</title>
  
</head>
<body>
  <div class="init-check"></div>

  <div class="sample-body">

    <!-- left nav -->
    <div class="left-nav">
      <!-- <a href="//sendbird.com" target="_blank"><div class="left-nav-icon"></div></a> -->
      <!-- <div class="site-logo">
          <a href="/site/index" class="brand"><img class="img-responsive" src="/frontend/images/logo.png" alt="EdenWoolf"/></a>                                                   
      </div> -->
     <!--  <div class="left-nav-channel-select">
        <button type="button" class="left-nav-button left-nav-open" id="btn_open_chat">
          OPEN CHANNEL
          <div class="left-nav-button-guide"></div>
        </button>
        <button type="button" class="left-nav-button left-nav-messaging" id="btn_messaging_chat">
          FIND USER
          <div class="left-nav-button-guide"></div>
        </button>
      </div> -->

      <div class="left-nav-channel-section">
        <!-- <div class="left-nav-channel-title">OPEN CHAT</div>
        <div class="left-nav-channel-empty">Get started to select<br>a channel</div>
        <div id="open_channel_list"></div> -->
        
        <div class="left-nav-channel-title title-messaging">All Conversation</div>
        <div id="messaging_channel_list"></div>
      </div>

     <!--  <div class="left-nav-user">
        <div class="left-nav-user left-nav-user-icon"></div>
        <div class="left-nav-user left-nav-login-user">
          <div class="left-nav-user left-nav-user-title">username</div>
          <div class="left-nav-user left-nav-user-nickname"></div>
        </div>
      </div> -->

    </div> <!-- // end left nav -->


    <!-- chat section -->
    <div class="profile" id="profile">
      <label class="profile-label">About</label>
      <div class="image"><img src="" class="profile-pic" id="myImg" alt="hello"  height="180px" width="180px"></div>
        <p id="exam" class="user-name"></p> 
      <!-- <div class="row"> -->
		<div class="user-review">
			<div class="show-review review-new">
				<ul>
					<li><i class="fas fa fa-star"></i></li>
					<li><i class="fas fa fa-star"></i></li>
					<li><i class="fas fa fa-star"></i></li>
					<li><i class="fa fa-star-half-o"></i></li>
					<li><i class="fa fa-star-o"></i></li>
				</ul>
				<h1>5 Reviews <span>( 3.5 )</span></h1>
			</div> 
		<!-- </div>  --> 
	</div>
  <br>
           <!-- <ul class="nw-list nw-lst-25"> -->
                       <!-- <li class="clearfix"> -->
                      <span class="col-sm-6 col-xs-6 left-span"><i class="fa fa-location-arrow" aria-hidden="true"></i>Location</span>
                      <p id="location" class="suburb"></p><!-- ,<p id="suburb" class="zipcode"></p> -->
                    <!-- </li> -->
                     
                    <!-- </ul> -->
    </div>
    <div class="right-section">

      <!-- modal-bg -->
      <div class="right-section__modal-bg"></div>


      <!-- top -->
      <div class="chat-top">
        <div class="chat-top__title"></div>
        <div class="chat-top-button">

          <div class="chat-top__button chat-top__button-invite">INVITE</div>
          <div class="modal-guide-user">
            user list
          </div>

          <div class="chat-top__button chat-top__button-member"></div>
          <div class="modal-guide-member">
            Current member list
          </div>

          <!-- <div class="chat-top__button chat-top__button-hide"></div> -->
          <div class="chat-top__button chat-top__button-leave"></div>
          <div class="modal-guide-leave">
            Delete
          </div>
          <input type="hidden" name="block" id="block" value="">
          <input type="hidden" name="block_status" id="block_status" value="0">
            <div class="chat-top__button chat-top__button-block"></div> 
           <div class="modal-guide-member">
            Block
          </div> 
         <!--  <div class="chat-top__button chat-top__button-member"></div>
          <div class="modal-guide-member">
            Current member list
          </div> -->

        </div>
      </div>

      <!-- channel empty -->
      <div class="chat-empty">
        <div class="chat-empty chat-empty__tile">WELCOME TO EdenWoolf CHAT</div>
        <div class="chat-empty chat-empty__icon"></div>
        <div class="chat-empty chat-empty__desc">
          Create or select a channel to chat in.<br>
          If you don't have a channel to participate,<br>
          go ahead and create your first channel now.
        </div>
      </div>

      <!-- chat -->
      <div class="chat">
        <div class="chat-canvas"></div>

        <div class="chat-input">
              <div id="container">
    </div>
          <label class="chat-input-file" for="chat_file_input">
            <input type="file" name="file" id="chat_file_input" style="display: none;">
          </label>  
          <!--[if gt IE 7]>
          <script>
             $('.chat-input-file').remove();
          </script>
          <a class="chat-input-file" id="chat_file_input2" href="javascript:;">
          </a>
          <![endif]-->
          <div class="chat-input-text">
            <textarea class="chat-input-text__field" placeholder="Write a chat" disabled="true" autofocus></textarea>
          </div>
        </div>
        <label class="chat-input-typing"></label>
      </div>

    </div> <!-- // end chat section -->

  </div>
  <!-----------------------
            modal
  ------------------------>
  <!-- <div class="modal-guide-create">
    <div class="modal-guide-create__title">Create Chat</div>
    <div class="modal-guide-create__desc">
      Click on any button to create a new channel<br>
      and start sending your first message!
    </div>
    <button type="button" class="modal-guide-create__button" id="guide_create">GOT IT!</button>
  </div> -->

  <div class="modal-open-chat">
    <div class="modal-messaging-top">
      <label class="modal-messaging-top__title">Open Channel</label>
      <button class="modal-messaging-top__btn" id="btn_create_open_channel"></button>
    </div>
    <div class="modal-open-chat-list"></div>
    <div class="modal-open-chat-more">
      <div class="modal-open-chat-more__text">MORE<div class="modal-open-chat-more__icon"></div></div>
    </div>
  </div>

  <div class="modal-messaging">
    <div class="modal-messaging-top">
      <label class="modal-messaging-top__title">Start Chat</label>
      <label class="modal-messaging-top__desc">Member list shows people inside the application.</label>
    </div>
    <div class="modal-messaging-list">
      <div class="modal-messaging-list__item">Username1<div class="modal-messaging-list__icon"></div></div>
      <div class="modal-messaging-list__item">Username2<div class="modal-messaging-list__icon modal-messaging-list__icon--select"></div></div>

      <div class="modal-messaging-more">MORE<div class="modal-messaging-more__icon"></div></div>
    </div>
    <div class="modal-messaging-bottom">
      <button type="button" class="modal-messaging-bottom__button" onclick="startMessaging()">START MESSAGE</button>
    </div>
  </div>

  <div class="modal-member">
    <div class="modal-member-title">CURRENT MEMBER LIST</div>
    <div class="modal-member-list"></div>
  </div>

  <div class="modal-invite">
    <div class="modal-invite-title">USER LIST</div>
    <div class="modal-invite-top">
      <label class="modal-messaging-top__title modal-invite-top__title">Start Chat</label>
      <label class="modal-invite-top__desc">Member list shows people inside the application.</label>
    </div>
    <div class="modal-messaging-list modal-invite-list">

    </div>
    <div class="modal-invite-bottom">
      <button type="button" class="modal-invite-bottom__button" onclick="inviteMember()">INVITE</button>
    </div>
  </div>

  <div class="modal-leave-channel">
    <div class="modal-leave-channel-card">
      <div class="modal-leave-channel-title">Are you Sure?</div>
      <div class="modal-leave-channel-desc">Do you want to leave this channel?</div>
      <div class="modal-leave-channel-separator"></div>
      <div class="modal-leave-channel-bottom">
        <button type="button" class="modal-leave-channel-button modal-leave-channel-close">CANCEL</button>
        <button type="button" class="modal-leave-channel-button modal-leave-channel-submit">YES</button>
      </div>
    </div>
  </div>

  <div class="modal-hide-channel">
    <div class="modal-hide-channel-card">
      <div class="modal-hide-channel-title">Are you Sure?</div>
      <div class="modal-hide-channel-desc">Do you want to hide this channel?</div>
      <div class="modal-hide-channel-separator"></div>
      <div class="modal-hide-channel-bottom">
        <button type="button" class="modal-hide-channel-button modal-hide-channel-close">CANCEL</button>
        <button type="button" class="modal-hide-channel-button modal-hide-channel-submit">YES</button>
      </div>
    </div>
  </div>

  <div class="modal-confirm">
    <div class="modal-confirm-card">
      <div class="modal-confirm-title">Are you Sure?</div>
      <div class="modal-confirm-desc">Do you want to hide this channel?</div>
      <div class="modal-confirm-separator"></div>
      <div class="modal-confirm-bottom">
        <button type="button" class="modal-confirm-button modal-confirm-close">CANCEL</button>
        <button type="button" class="modal-confirm-button modal-confirm-submit">YES</button>
      </div>
    </div>
  </div>

  <div class="modal-input">
    <div class="modal-input-card">
      <div class="modal-input-title">Type info</div>
      <div class="modal-input-desc">Create Open Channel</div>
      <div class="modal-input-box">
        <input type="text" class="modal-input-box-elem" />
      </div>
      <div class="modal-input-separator"></div>
      <div class="modal-input-bottom">
        <button type="button" class="modal-input-button modal-input-close">CANCEL</button>
        <button type="button" class="modal-input-button modal-input-submit">CREATE</button>
      </div>
    </div>
  </div>
  <script src="/web/frontend/whole_chat/static/lib/SendBird.min.js"></script>
  <script src="/web/frontend/whole_chat/static/js/util.js"></script>
  <script src="/web/frontend/whole_chat/static/js/chat.js"></script>

</body>
</html>
<div class="modal fade cust-my-modal2" id="carer_search_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content search-carer">
            <div class="cont-holder">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title nw_log_in" id="myModalLabel">Search for a Carer</h4>
                </div>
                <div class="modal-body">
                    <form id="carer_search_form" class="form-horizontal" action="/search/carersearch" method="GET" enctype="multipart/form-data">                    <!--<form id="carer_search_form" action="/search/carersearch" method="post">-->
                    <div class="search-step1" id="carer_search_step_1" style="display:block;">
                        <div class="row">
                            <div class="col-sm-10 col-md-offset-1">
                                <div class="check-heading">Postcode</div>
                                <div class="form-group">
                                    <input type="hidden" id="search-autocomplete-init" value="0">
                                    <input type="hidden" id="searchcarer-address_postcode1" class="form-control" name="SearchCarer[address_postcode1]" value="">
                                    <input type="text" name="SearchCarer[address_postcode]" id="searchcarer-address_postcode" onkeyup="modaleasyautocompleteInit('searchcarer-address_postcode')" placeholder="Enter postcode">
                                    <input type="hidden" name="SearchCarer[latitude]" id="searchcarer-latitude" placeholder="latitude">
                                    <input type="hidden" name="SearchCarer[longitude]" id="searchcarer-longitude" placeholder="longitude">
                                </div>
                                <div class="distance-check">
                                    <span>Within</span>
                                    <div class="chk-new">
                                        <input type="radio" name="SearchCarer[distance_within][]" id="searchcarer-distance_within_1" value="5">
                                        <label for="searchcarer-distance_within_1" class="cst-lbl-chk">
                                            5 km
                                        </label>
                                    </div>
                                    <div class="chk-new">
                                        <input type="radio" id="searchcarer-distance_within_2" name="SearchCarer[distance_within][]" value="10">
                                        <label for="searchcarer-distance_within_2" class="cst-lbl-chk">
                                            10 km
                                        </label>
                                    </div>
                                    <div class="chk-new">
                                        <input type="radio" id="searchcarer-distance_within_3" name="SearchCarer[distance_within][]" value="50">
                                        <label for="searchcarer-distance_within_3" class="cst-lbl-chk">
                                            50 km
                                        </label>
                                    </div>
                                </div>
                                <!--                                <div class="btn-sec">
                                                                    <button type="button" id="openpreviouscarersearchtab_3" onclick="opennextcarersearchtab(this)" data-target="previous" data-tabId="3">Back</button>
                                                                    <button type="button" id="opennextcarersearchtab_3" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="3">Next</button>
                                                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-offset-1">
                                <div class="check-heading">Type of Care</div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_1" type="checkbox" id="care_type" name="SearchCarer[care_type][]" value="1">
                                    <label for="searchcarer-care_type_1" class="cst-lbl-chk">
                                        Child care
                                    </label>
                                </div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_2" type="checkbox" name="SearchCarer[care_type][]" value="2">
                                    <label for="searchcarer-care_type_2" class="cst-lbl-chk">
                                        Aged care
                                    </label>
                                </div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_3" type="checkbox" name="SearchCarer[care_type][]" value="3">
                                    <label for="searchcarer-care_type_3" class="cst-lbl-chk">
                                        Disability care
                                    </label>
                                </div>

                                <!--                                <div class="btn-sec">
                                                                    <button type="button" id="opennextcarersearchtab_1" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="1">Next</button>
                                                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-md-offset-1">
                                <div class="check-heading">Type of Job:</div>
                                                                                                                        <div class="checkbox chk-new">
                                                <input id="searchcarer-job_type_1" type="checkbox" name="SearchCarer[job_type][]" value="1">
                                                <label for="searchcarer-job_type_1" class="cst-lbl-chk">Permanent or long-term carer</label>
                                            </div>
                                                                                <br>
                                                        <div class="checkbox chk-new">
                                                <input id="searchcarer-job_type_2" type="checkbox" name="SearchCarer[job_type][]" value="2">
                                                <label for="searchcarer-job_type_2" class="cst-lbl-chk">Carer for a specific date and time</label>
                                            </div>
                                                                                <br>
                                                        <div class="checkbox chk-new">
                                                <input id="searchcarer-job_type_3" type="checkbox" name="SearchCarer[job_type][]" value="3">
                                                <label for="searchcarer-job_type_3" class="cst-lbl-chk">Live-in carer/nanny</label>
                                            </div>
                                                                                <br>
                                                    <br>
                                    <!--                                <div class="btn-sec">
                                                                    <button type="button" id="openpreviouscarersearchtab_2" onclick="opennextcarersearchtab(this)" data-target="previous" data-tabId="2">Back</button>
                                                                    <button type="button" id="opennextcarersearchtab_2" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="2">Next</button>
                                                                </div>-->
                            </div>
                        </div>

                        <div class="text-center new-btn-cent">
                            <a class="style-btn" href="javascript:;" onclick="submitCarerSearchModal();"><span>Search</span></a>
                        </div>

                    </div>
                    <!--</form>-->
</form>                    <div class="modal-body-pic"><img src="/frontend/images/carer-modal-img.png"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>        <script src="/assets/c8619007/yii.js"></script> -->
<script src="/frontend/custom/js/materialize.js"></script>
<script src="/frontend/custom/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>
<script src="/assets/c8619007/yii.activeForm.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/main.js"></script>
<script src="/frontend/js/bootstrap-select.js"></script>
<script src="/frontend/js/jquery.nicescroll.js"></script>
<script src="/frontend/css/bootstrap_select2/select2.full.js"></script>
<script src="/frontend/custom/js/script.js"></script>
<script src="/frontend/custom/js/global.js"></script>
<script src="/frontend/custom/js/carer_search.js"></script>
<script src="/frontend/custom/js/carer.js"></script>
<script src="/frontend/custom/js/family_search.js"></script>
<script src="/frontend/custom/notie-master/notie.min.js"></script>
<script>jQuery(function ($) {
jQuery('#carer_search_form_index').yiiActiveForm([], []);
jQuery('#carer_search_form').yiiActiveForm([], []);
});</script>    </body>
</html>


<script type="text/javascript">
    $(document).ready(function ($) {
        adjustWinHeight();

        $(window).resize(function () {
            adjustWinHeight();
        });

    });

    function adjustWinHeight() {
        var $ = jQuery;
        var winHeight = $(window).height();
        var footerHeight = $('.footer').height();
        var headerHeight = $('.header').height();
        var mainHeight = winHeight - (parseInt(headerHeight) + parseInt(footerHeight));

        $('.main-body-wrap').css('min-height', mainHeight);
    }
     function ajaxindicatorstart_search()
    {
     $('.searchloader').show();   
    }
    function ajaxindicatorstop_search()
    {
      $('.searchloader').hide();  
    }

    function ajaxindicatorstart() {
        if (jQuery('body').find('#resultLoading').attr('id') != 'resultLoading') {
            jQuery('body').append('<div id="resultLoading" style="display:none"><div><i style="font-size: 46px;color: #8EB849; " class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"></i></div><div class="bg"></div></div>');
        }

        jQuery('#resultLoading').css({
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'z-index': '10000000',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto'
        });

        jQuery('#resultLoading .bg').css({
            'background': '#000',
            'opacity': '0.6',
            'width': '100%',
            'height': '100%',
            'position': 'absolute',
            'top': '0'
        });

        jQuery('#resultLoading>div:first').css({
            'width': '250px',
            'height': '75px',
            'text-align': 'center',
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'right': '0',
            'bottom': '0',
            'margin': 'auto',
            'font-size': '16px',
            'z-index': '10',
            'color': '#ffffff'

        });

        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
        jQuery('body').css('cursor', 'wait');
    }

    function ajaxindicatorstop() {
        jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
        jQuery('body').css('cursor', 'default');
    }

    function getfamilyProfile1(){
    	var id = document.getElementById('block').value;
		ajaxindicatorstart();
		var url =  "/search/getfamilyprofile1ajax";
		$.ajax({
			url: url,
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function (resp) {
				ajaxindicatorstop();
				$('#profile').html(resp.html);
			},
			error: function () {
				ajaxindicatorstop();
			}
		});
	}
</script>
