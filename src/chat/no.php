 <?php

 require_once "../../config.php";
 session_start();

  ?>

 <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <!--========== BOX ICONS ==========-->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
         <!--========== CSS ==========-->
         <link rel="stylesheet" href="navstyles.css">
         <!--========== CHAT ==========-->
         <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

         <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
         <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

         <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
         <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
         <script src="https://use.typekit.net/hoy3lrg.js"></script>
         <script>try{Typekit.load({ async: true });}catch(e){}</script>
         <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
         <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
         <link rel="stylesheet" href="styles.css">

     </head>
     <body>

         <!--========== NAV ==========-->
         <div class="nav" id="navbar" style="font-family: Poppins, sans-serif;">
             <nav class="nav__container">
                 <div>
                     <a href="#" class="nav__link nav__logo">
                         <i class='bx bxs-disc nav__icon' ></i>
                         <span class="nav__logo-name">Patch</span>
                     </a>

                     <div class="nav__list">
                         <div class="nav__items">
                             <h3 class="nav__subtitle" style="font-weight: 600;">Profile</h3>

                             <a href="../home/index.html" class="nav__link">
                                 <i class='bx bx-home nav__icon' ></i>
                                 <span class="nav__name">Home</span>
                             </a>

                             <a href="#" class="nav__link active">
                                 <i class='bx bx-message-rounded nav__icon' ></i>
                                 <span class="nav__name">Messages</span>
                             </a>

                             <div class="nav__dropdown">
                                 <a href="../profile/profile.php" class="nav__link">
                                     <i class='bx bx-user nav__icon' ></i>
                                     <span class="nav__name">Profile</span>
                                     <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                 </a>

                                 <div class="nav__dropdown-collapse">
                                     <div class="nav__dropdown-content">
                                         <a href="../profile/profile.php" class="nav__dropdown-item">My personal</a>
                                         <a href="../profile/profile.php" class="nav__dropdown-item">My pets</a>
                                     </div>
                                 </div>
                             </div>

                         </div>

                         <div class="nav__items">
                             <h3 class="nav__subtitle" style="font-weight: 600;">Match</h3>

                             <a href="../match/match.php" class="nav__link">
                                 <i class='bx bx-compass nav__icon' ></i>
                                 <span class="nav__name">Explore patchs</span>
                             </a>

                             <div class="nav__dropdown">
                                 <a href="#" class="nav__link">
                                     <i class='bx bx-bell nav__icon' ></i>
                                     <span class="nav__name">Notifications</span>
                                     <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                 </a>

                                 <div class="nav__dropdown-collapse">
                                     <div class="nav__dropdown-content">
                                         <a href="#" class="nav__dropdown-item">Blocked</a>
                                         <a href="#" class="nav__dropdown-item">Silenced</a>
                                         <a href="#" class="nav__dropdown-item">Activated</a>
                                     </div>
                                 </div>

                             </div>

                         </div>
                     </div>
                 </div>

                 <a href="../home/logout.php" class="nav__link nav__logout">
                     <i class='bx bx-log-out nav__icon' ></i>
                     <span class="nav__name">Log Out</span>
                 </a>
             </nav>
         </div>

         <!--========== CONTENTS ==========-->

         <div id="frame">
             <div id="sidepanel">
                 <div id="profile">
                     <div class="wrap">
                         <img id="profile-img" src="<?php echo $_SESSION["owner_img"]; ?>" class="online" alt="" />
                         <p><?php echo $_SESSION["owner_name"]; ?></p>
                         <div id="status-options">
                             <ul>
                                 <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                                 <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                                 <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                                 <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                             </ul>
                         </div>
                         <div id="expanded">
                             <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                             <input name="twitter" type="text" value="mikeross" />
                             <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                             <input name="twitter" type="text" value="ross81" />
                             <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                             <input name="twitter" type="text" value="mike.ross" />
                         </div>
                     </div>
                 </div>
                 <div id="search">
                     <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                     <input type="text" placeholder="Search contacts..." />
                 </div>
                 <div id="contacts">
                     <ul>
                         <li class="contact active">
                             <div class="wrap">
                                 <span class="contact-status busy"></span>
                                 <img src="../images/profile.png" alt="" />
                                 <div class="meta">
                                     <p class="name">Patch</p>
                                     <p class="preview"></p>
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="content">
                 <div class="contact-profile">
                     <img src="../images/profile.php" alt="" />
                     <p>Patch</p>
                     <div class="social-media">
                         <i class="fa fa-facebook" aria-hidden="true"></i>
                         <i class="fa fa-twitter" aria-hidden="true"></i>
                         <i class="fa fa-instagram" aria-hidden="true"></i>
                     </div>
                 </div>
                 <div class="messages">
                     <ul>
                         <li class="replies">
                             <img src="<?php echo $owner_img; ?>" alt="" />
                             <p>Hi! You have no patches :(</p>
                         </li>
                         <li class="replies">
                             <img src="<?php echo $owner_img; ?>" alt="" />
                             <p>Go Back and patch with someone so that we can get you started :D</p>
                         </li>

                     </ul>
                 </div>
                 <div class="message-input">
                     <div class="wrap">
                     <input type="text" placeholder="Write your message..." />
                     <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true" style="font-size: 2.2em"></i></button>
                     </div>
                 </div>
             </div>
         </div>

         <!--========== MAIN JS ==========-->
         <script src="../sidebar/assets/js/main.js"></script>
         <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
         <script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

         $("#profile-img").click(function() {
             $("#status-options").toggleClass("active");
         });

         $(".expand-button").click(function() {
         $("#profile").toggleClass("expanded");
             $("#contacts").toggleClass("expanded");
         });

         $("#status-options ul li").click(function() {
             $("#profile-img").removeClass();
             $("#status-online").removeClass("active");
             $("#status-away").removeClass("active");
             $("#status-busy").removeClass("active");
             $("#status-offline").removeClass("active");
             $(this).addClass("active");

             if($("#status-online").hasClass("active")) {
                 $("#profile-img").addClass("online");
             } else if ($("#status-away").hasClass("active")) {
                 $("#profile-img").addClass("away");
             } else if ($("#status-busy").hasClass("active")) {
                 $("#profile-img").addClass("busy");
             } else if ($("#status-offline").hasClass("active")) {
                 $("#profile-img").addClass("offline");
             } else {
                 $("#profile-img").removeClass();
             };

             $("#status-options").removeClass("active");
         });

         function newMessage() {
             message = $(".message-input input").val();
             if($.trim(message) == '') {
                 return false;
             }
             $('<li class="sent"><img src="<?php echo $_SESSION["owner_img"]; ?>" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
             $('.message-input input').val(null);
             $('.contact.active .preview').html('<span>You: </span>' + message);
             $(".messages").animate({ scrollTop: $(document).height() }, "fast");
         };

         $('.submit').click(function() {
         newMessage();
         });

         $(window).on('keydown', function(e) {
         if (e.which == 13) {
             newMessage();
             return false;
         }
         });
         </script>
     </body>
 </html>
