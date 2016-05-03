<section id="landing">
    <div id="home" class="heder">
        <div class="container">
            <div class="header-top">
                <div class="heder-logo">
                    <h1><a href="#">TEAMUP</a></h1>
                </div>
                <div class="top-nav">
                    <span class="menu"><img src="<?= ABSOLUTH_PATH_IMAGES ?>other/menu.png" alt=""></span>
                    <ul class="nav1">
                        <li><a class="Signup play-icon popup-with-zoom-anim" href="#small-dialog2">Sign up</a></li>
                        <li><a class="LogIn play-icon popup-with-zoom-anim" href="#small-dialog3">Log In</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div id='bg'>
        <video id="bgvid" autoplay="" loop="" muted="true">
          <source src="../assets/images/backgrounds/stephvideo.mp4" type="video/mp4"/>
        </video>
    </div>
    <div id="small-dialog2" class="mfp-hide">
        <?php
        echo $forms->SignUpForm();
        $forms->SignUpProcess($pg['signup']);
        ?>
    </div>  
    <div id="small-dialog3" class="mfp-hide">
        <?php
        echo $forms->LoginForm();
        ?>
        <?php


        $forms->LoginProcess($pg['login']);
        ?>
        <script type='text/javascript' src='<?= ABSOLUTH_PATH_JS ?>ajax_proccess.js'></script>


    </div>

    <div id="services" class="services">
        <div class="container">
            <div class="col-md-4 services-hedding wow bounceIn" data-wow-delay="0.4s">
                <h3>HOW TO PLAY</h3>
                <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/plays.png" ?>"  id="pics">
                </div>
            </div>
            
            </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div> 


    <div class="our-team">
        <div class="container">
            <div class="team-hedding wow bounceIn" >
                <h3 class = "about">ABOUT TEAMUP</h3>
            </div>
            <div class="team-grids">
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>AN INDUSTRY INNOVATOR </h5>
                        <p>TeamUp provides a unique fantasy experience utilizing multiple sports</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>YEAR ROUND MATCHUPS</h5>
                        <p>Drafting from any of the four major US sports ensures you year-round fun</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>SOMETHING FOR EVERYONE</h5>
                        <p>Easy to play and easy to win -everyone can join in on the action</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>PLAY ANYWHERE</h5>
                        <p>Available on desktop, tablet & mobile - Mobile Friendly for Android & iOS</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>REAL TIME STATISTICS</h5>
                        <p>Football, baseball, basketball, & hockey team statistics updated in realtime</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>FAVORITE TEAMS</h5>
                        <p>Add all of your favorite teams from across many sports</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                        <h5>WINNINGS</h5>
                        <p>We give you the best up-to-date statistics to give you the winning edge</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="team-bottom">
        <div class="container">
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                <p id="numUsers"></p>
                <p class="text">USERS</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                <p id="numLeagues"></p>
                <p class="text">LEAGUES</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                <p id="numTeams"></p>
                <p class="text">TEAMS</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                <p id="numPoints"></p>
                <p class="text">POINTS</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

     <div id="services" class="services">
        <div class="container">
            <div class="col-md-4 services-hedding wow bounceIn" data-wow-delay="0.4s">
                <h3>PLAY WHEN YOU WANT. WHERE YOU WANT. ON ANY DEVICE.</h3>
                <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/mobile.png" ?>" id="pics">
                </div>
            </div>
            
            </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    <div id="about" class="skills">
        <div class="container">
            <div class="skills-hedding wow bounceIn" data-wow-delay="0.4s">
                <h3>Our skills</h3>
            </div>
            <div class="col-md-9">
                <div class="col-md-3 skills-grid">
                    <div class="circle" id="circles-1"></div>
                </div>
                <div class="col-md-3 skills-grid">
                    <div class="circle" id="circles-2"></div>
                </div>
                <div class="col-md-3 skills-grid">
                    <div class="circle" id="circles-3"></div>
                </div>
                <div class="col-md-3 skills-grid">
                    <div class="circle" id="circles-4"></div>
                </div>
                <div class="clearfix"> </div>
                <div class="skills-grid-text">
                    <h5 class="plus wow fadeInRight">Something about our skills</h5>
                    <p class="wow bounceIn" data-wow-delay="0.4s">We utilized both our professional and academic programming skills to create a new style
                        fantasy sports league that runs all year.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="totam">
                    <div class="tab1 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><span> </span></li>
                            <li class="text">Totam rem aperiam eaque</li>
                            <li class="minus">-</li>
                        </ul>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                    </div>
                    <div class="tab2 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li class="glyphicon glyphicon-star"></li>
                            <li class="sub-text">PHP</li>
                            <li class="char">+</li>
                        </ul>
                        <p>Our project is built with object-oriented PHP. We run a loader class to pre-load all necessary files for a more quick and efficient solution</p>
                    </div>
                    <div class="tab3 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li class="glyphicon glyphicon-star"></li>
                            <li class="sub-text">Node</li>
                            <li class="char">+</li>
                        </ul>
                        <p>Without any free sports API's, we decided to scrap our data from the web. We run that project in Node and call it once a day through a cronjob</p>
                    </div>
                    <div class="tab4 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li class="glyphicon glyphicon-star"></li>
                            <li class="sub-text">Javascript/Jquery</li>
                            <li class="char">+</li>
                        </ul>
                        <p>We run JQuery as our front-end Javascript library. Through ajax calls, we call our necessary PHP functions</p>
                    </div>
                    <div class="tab5 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li class="glyphicon glyphicon-star"></li>
                            <li class="sub-text">Python</li>
                            <li class="char">+</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- container -->
    </div>
    <div class="footer">
        <!-- container -->
        <div class="container">
            <h4>TeamUp</h4>
            <br>
            <a class="scroll" href="#home"><img src="<?= ABSOLUTH_PATH_IMAGES ?>other/up-arrow.png" alt="" /></a>
        </div>
        <!-- container -->
    </div>

</section>

