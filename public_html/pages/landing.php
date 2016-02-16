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

    <div class="banner">
        <div class="container">
            <div class="banner-info wow bounceIn" data-wow-delay="0.4s">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                    <span> </span>
                </a>
                <div class="banner-text">
                    <h2>Learn more about fantasy sports</h2>
                    <p><a class="play-icon popup-with-zoom-anim" href="#small-dialog">Click to play video</a></p>
                </div>

                <div id="small-dialog" class="mfp-hide">
                    <iframe src="http://www.youtube.com/embed/S-jqDdQ_-SM" width="560" height="315" frameborder="0" allowfullscreen></iframe>        
                </div>

                <div id="small-dialog2" class="mfp-hide">
                <?php
                    $forms->SignUpProcess($pg['signup']);
                    echo $forms->SignUpForm();
                ?>
                </div>	
                <div id="small-dialog3" class="mfp-hide">
                <?php
                    $forms->LoginProcess($pg['login']);
                    echo $forms->LoginForm();
                ?>
                </div>				
            </div>
        </div>
    </div>

    <div id="services" class="services">
        <div class="container">
            <div class="col-md-4 services-hedding wow bounceIn" data-wow-delay="0.4s">
                    <h3>Our Services</h3>
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                    <div class="col-md-9 img-grid-text">
                            <h4>Year Round Match Ups</h4>
                            <p>Drafting from any of the four major US leagues ensures year-round fun</p>
                    </div>
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                    <div class="col-md-9 img-grid-text">
                            <h4>Favorite Teams</h4>
                            <p>You can add all your favorite teams from your home city</p>
                    </div>
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                    <div class="col-md-9 img-grid-text">
                            <h4>Winning Odds</h4>
                            <p>We give you the best up-to-date statistics to ensure your success</p>
                    </div>
            </div>
            <div class="col-md-4 services-info wow bounceIn" data-wow-delay="0.4s">
                    <div class="col-md-9 img-grid-text">
                            <h4>Real-Time Scoring</h4>
                            <p>Grabbing data as it happens</p>
                    </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>              
    <div class="our-team">
        <div class="container">
            <div class="team-hedding wow bounceIn" data-wow-delay="0.4s">
                    <h3>Our team</h3>
            </div>
            <div class="team-grids">
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                            <h5>Rostom Sahakian</h5>
                            <p class="caption">Back-End Developer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                            <h5>Jamey Dogom</h5>
                            <p class="caption">Front-End Developer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                            <h5>Ibrahim Hayek</h5>
                            <p class="caption">Back-End Developer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                </div>
                <div class="col-md-6 team-grid">
                    <div class="team-grid-text wow bounceIn" data-wow-delay="0.4s">
                            <h5>Alex Markarian</h5>
                            <p class="caption">Front-End Developer</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="team-bottom">
        <div class="container">
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                    <p>2009</p>
                    <p class="text">USERS</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                    <p>13,562</p>
                    <p class="text">LEAGUES</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                    <p>8,710</p>
                    <p class="text">TEAMS</p>
            </div>
            <div class="col-md-3 gift wow bounceIn" data-wow-delay="0.4s">
                    <p>715</p>
                    <p class="text">AWARDS</p>
            </div>
            <div class="clearfix"> </div>
        </div>
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
                                    <p class="wow bounceIn" data-wow-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                            Excepteur sint occaecat cupidatat non proident.
                                    </p>
                                    <p class="wow bounceIn" data-wow-delay="0.4s">	Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                                            dicta.
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
                                                    <li class="lock"></li>
                                                    <li class="sub-text">Nemo enim ipsam voluptatem</li>
                                                    <li class="char">+</li>
                                            </ul>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                                    </div>
                                    <div class="tab3 wow bounceIn" data-wow-delay="0.4s">
                                            <ul>
                                                    <li class="tower"></li>
                                                    <li class="sub-text">Ut enim ad minima veniam</li>
                                                    <li class="char">+</li>
                                            </ul>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                                    </div>
                                    <div class="tab4 wow bounceIn" data-wow-delay="0.4s">
                                            <ul>
                                                    <li class="phone"></li>
                                                    <li class="sub-text">Quis nostrum exercitationem ullam</li>
                                                    <li class="char">+</li>
                                            </ul>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                                    </div>
                                    <div class="tab5 wow bounceIn" data-wow-delay="0.4s">
                                            <ul>
                                                    <li class="book"></li>
                                                    <li class="sub-text">Neque porro quisquam est qui</li>
                                                    <li class="char">+</li>
                                            </ul>
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
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

