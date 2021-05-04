<!DOCTYPE html>
<html lang="en">
<head>
  <title>SocketIo - Tchat</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= lib([
    "font-awesome/css/font-awesome",
    "Ionicons/css/ionicons",
    "perfect-scrollbar/css/perfect-scrollbar",
    "jquery-switchbutton/jquery.switchButton",
    "summernote/summernote-bs4",
    "codemirror/codemirror",
    "codemirror/theme/eclipse",
    "codemirror/theme/dracula",
    "codemirror/theme/base16-light",
    "codemirror/theme/lesser-dark"
  ], false) ?>
  <?= css(['bootstrap.min.css', 'bracket.css', 'app']) ?>
</head>
<body class="email">
  <div class="position-absolute fade-mask">
    <div class="position-relative mask">
      <form id="loginForm" action="" method="post">
        <div class="d-flex align-items-center justify-content-center bg-gray-300 pd-x-20 pd-xs-x-0">
          <div class="card wd-350 shadow-base">
            <div class="card-body pd-x-20 pd-xs-40">
              <h5 class="tx-xs-24 tx-normal tx-gray-900 mg-b-15">Connectez vous</h5>
              <p class="mg-b-30 tx-14">Vous n'avez pas de compte? <a href="#signup tx-info">Creer un compte</a>, en quelques minutes.</p>
              <div class="form-group">
                <input class="form-control" id="name" type="text" name="name" placeholder="Entrer votre nom">
              </div><!-- form-group -->
              <div class="form-group">
                <input class="form-control" id="email" type="text" name="email" placeholder="Entrer l'adresse email">
              </div><!-- form-group -->
              <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Entrer le mot de passe">
              </div><!-- form-group -->
              <button class="btn btn-info btn-block" type="submit">Se Connecter</button>
            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- d-flex -->
      </form>
    </div>
  </div>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="#"><span>[</span>SocketIo <i>Tchat</i><span>]</span></a></div>
    
    <div class="br-sideleft spend">
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 overflow-y-auto active" id="contacts" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Online Contacts</label>
          <div class="contact-list contact-list-connected pd-x-10">
          </div><!-- contact-list -->


          <label class="sidebar-label pd-x-25 mg-t-25">Offline Contacts</label>
          <div class="contact-list contact-list-disconnected pd-x-10">
            <a href="#" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="../img/img2.jpg" alt="">
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p>Marilyn Tarter</p>
                  <span>Clemson, CA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->

        </div><!-- #contacts -->
      </div><!-- tab-content -->
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-230 transition">
          <input id="searchbox" type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Messages</label>
                <a href="#">+ Add New Message</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="#" class="media-list-link">
                  <div class="media">
                    <img src="../img/img3.jpg" alt="">
                    <div class="media-body">
                      <div>
                        <p>Donna Seay</p>
                        <span>2 minutes ago</span>
                      </div><!-- d-flex -->
                      <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="dropdown-footer">
                  <a href="#"><i class="fa fa-angle-down"></i> Show All Messages</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="#" class="nav-link pd-x-7 pos-relative bell" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle notification-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="#">Mark All as Read</a>
              </div><!-- d-flex -->

              <div class="media-list notifications-list">

              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
              
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="name-info tx-center">
                
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="#"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->

    <div class="br-mailbox-body">
      <div class="br-msg-header d-flex justify-content-between">
        <div class="media align-items-center">
          <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
          <div class="media-body mg-l-10">
            <p class="tx-poppins tx-info tx-24 mg-b-0">Louise Kate Lumaad</p>
            <p class="tx-12 tx-white mg-b-0">
              <span>Sep 20, 2017 8:45am</span>
            </p>
          </div><!-- media-body -->
        </div><!-- media -->
        <nav class="nav nav-inline tx-size-24 mg-b-0 lh-0">
          <a href="#" class="nav-link tx-gray-light hover-inverse pd-x-5"><i class="icon ion-android-more-horizontal"></i></a>
          <a id="closeMail" href="#" class="nav-link pd-x-5 mg-l-15 hidden-xl-up">
            <i class="icon ion-close"></i>
          </a>
        </nav>
      </div><!-- br-msg-header -->
      <div class="tchat-box">
        <div class="br-msg-body widget-6">
          <div class="card-body">
              <div id="messages" class="media-list">
                <div id="msgtpluser" class="media d-none">
                  <img src="{{user.avatar}}" class="wd-36 rounded-circle mg-r-20" alt="">
                  <div class="media-body tx-12">
                    <div class="message-text">
                      <div class="chat-1">
                        {{{ content }}}
                      </div>
                      <span class="chat-time">{{h}}:{{m}}</span>
                    </div>
                  </div><!-- media-body -->
                </div><!-- media -->
                
                <div id="msgtplme" class="media text-right flex flex-row-reverse d-none">
                  <img src="{{user.avatar}}" class="wd-36 rounded-circle mg-l-20" alt="">
                  <div class="media-body tx-12">
                    <div class="message-text">
                      <div class="chat-2 chat">
                        {{{ content }}}
                      </div>
                      <span class="chat-time">{{h}}:{{m}}</span>
                    </div>
                    <hr class="invisible mg-y-2">

                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- media-list -->
            </div>
        </div>
        <div class="pd-x-30 pd-b-15 color-dark">
          <form action="" method="post" id="msgform">
            <div class="row">
              <div class="col-md-11">
                <textarea id="message" class="form-control ht-50" placeholder="Click to write message"></textarea>
              </div>
              <div class="col-md-1 submit">
                <button type="submit" class="btn btn-info send"><i class="fa fa-send"></i></button>
              </div>
            </div><!-- row -->
          </form>
        </div>
      </div>
    </div><!-- br-mailbox-body -->

    <!-- ########## END: HEAD PANEL ########## -->
    <script src="http://localhost:1337/socket.io/socket.io.js"></script>
    <script src="https://unpkg.com/mustache@latest"></script>
    <?= lib([
      "jquery/jquery",
      "popper/popper",
      "bootstrap/bootstrap",
      "perfect-scrollbar/js/perfect-scrollbar.jquery",
      "moment/moment",
      "jquery-ui/jquery-ui",
      "jquery-switchbutton/jquery.switchButton",
      "peity/jquery.peity",
      "summernote/summernote-bs4.min",
      "highlightjs/highlight.pack",
      "codemirror/codemirror",
      "codemirror/mode/javascript/javascript",
      "codemirror/addon/scroll/simplescrollbars",
      ]) ?>
    <?= js(['bracket', 'app', 'mustache']) ?>
    <script>
      $(function(){
        'use strict';

        $('#message').summernote({
          height: 50,
          tooltip: false,
          resize: false
        })

        $('.note-btn-group .dropdown-item[data-value=pre]').on('click', function (e) {
          CodeMirror(document.querySelector('.note-editable.card-block pre'), {
            lineNumbers: true,
            theme: 'dracula',
            mode: 'javascript',
            value: '',
            scrollbarStyle: 'overlay'
          })
        })

        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');

        $('.br-mailbox-list').perfectScrollbar();

        $('#showMailBoxLeft').on('click', function(e){
          e.preventDefault();
          if($('body').hasClass('show-mb-left')) {
            $('body').removeClass('show-mb-left');
            $(this).find('.fa').removeClass('fa-arrow-left').addClass('fa-arrow-right');
          } else {
            $('body').addClass('show-mb-left');
            $(this).find('.fa').removeClass('fa-arrow-right').addClass('fa-arrow-left');
          }
        });
      });
    </script>
</body>
</html>