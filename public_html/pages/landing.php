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
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/playing.png" ?>"  id="how_pics">
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
                <h3>PLAY WHENEVER. WHEREVER.</h3>
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/mobile.png" ?>" id="play_pics">
            </div>
            
            </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="our-team">
        <div class="container">
            <div class="team-hedding wow bounceIn" >
                <h3 class = "about">FOR EVERY SPORTS FAN. EVERY-DAY. ALL YEAR.</h3>
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
                    <h5 class="plus wow fadeInRight">TeamUp</h5>
                    <p class="wow bounceIn" data-wow-delay="0.4s">TeamUp combines the love we have for fantasy sports and allows us to use our knowledge in a unique fantasy experience. Players are allowed to select teams from the Big 4 Sports and compete head to head with friends. These sports are overlap with eachother in such a way that the fun continues year round!
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="totam">
                    <div class="tab1 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/four.png" ?>" width = "14" height = "16" ></li>
                            <li class="text">Major U.S. Sports</li>
                            <li class="minus">-</li>
                        </ul>
                        <p>The four leagues universally included in the definition are Major League Baseball (MLB), the National Basketball Association (NBA), the National Football League (NFL), and the National Hockey League (NHL).</p>
                    </div>
                    <div class="tab2 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/baseball.png" ?>" width = "14" height = "16" ></li>
                            <li class="sub-text">MLB</li>
                            <li class="char">+</li>
                        </ul>
                        <p>Major League Baseball is the highest level of play of baseball in North America. It consists of the National League (founded in 1876) and the American League (founded in 1901). Cooperation between the two leagues began in 1903, and the two merged on an organizational level in 2000 with the elimination of separate league offices; they have shared a single Commissioner since 1920. There are currently 30 member teams, with 29 located in the U.S. and 1 in Canada. Traditionally called the "National Pastime", baseball was the first professional sport in the U.S.</p>
                    </div>
                    <div class="tab3 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/basketball.png" ?>" width = "14" height = "16" ></li>
                            <li class="sub-text">NBA</li>
                            <li class="char">+</li>
                        </ul>
                        <p>The National Basketball Association is the premier basketball league in the world. It was founded as the Basketball Association of America in 1946, and adopted its current name in 1949, when the BAA partially absorbed the rival National Basketball League. Four teams from the rival American Basketball Association joined the NBA with the ABA–NBA merger in 1976. It has 30 teams, 29 in the United States and 1 in Canada. The NBA is watched by audiences both domestically and internationally.

</p>
                    </div>
                    <div class="tab4 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/football.png" ?>" width = "14" height = "16" ></li>
                            <li class="sub-text">NFL</li>
                            <li class="char">+</li>
                        </ul>
                        <p>The National Football League was founded in 1920 as a combination of various teams from regional leagues such as the Ohio League, the New York Pro Football League, and the Chicago circuit. The NFL partially absorbed the All-America Football Conference in 1949 and merged with the American Football League in 1970. It has 32 teams, all located in the United States.

                        NFL games are the most attended of domestic professional leagues in the world, in terms of per-game attendance, and the most popular in the U.S. in terms of television ratings and merchandising. Its championship game, the Super Bowl, is the most watched annual event on U.S. television, with Super Bowl XLIX being the single most-watched program in U.S. television history.</p>
                    </div>
                    <div class="tab5 wow bounceIn" data-wow-delay="0.4s">
                        <ul>
                            <li><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/puck.png" ?>" width = "14" height = "16" ></li>
                            <li class="sub-text">NHL</li>
                            <li class="char">+</li>
                        </ul>
                        <p>The National Hockey League is the only one of the major leagues to have been founded in Canada. It was formed in 1917 as a successor to the Canadian National Hockey Association (founded 1909), taking all but one of the NHA's teams. The NHL partially absorbed the rival World Hockey Association in 1979. There are 30 teams, with 23 in the U.S. and 7 in Canada.

                        The most popular sports league in Canada, and widely followed across the northern U.S., the NHL has expanded southward in recent decades to attempt to gain a more national following in the United States, in cities such as Dallas, Miami, Nashville, Phoenix, Raleigh, and Tampa, with varying success. Hockey remains much more popular in the northern states of the U.S. closer to Canada, such as the Upper Midwest and New England, than in the rest of the United States. The NHL has more Canadian teams (seven) than MLB, the NBA, the NFL, and Major League Soccer combined (five).</p>
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

