<html>
    <head>
        <meta charset="utf-8">
        <title>Team-Up</title>
        <meta name="description" content="HTML framework description">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/profile-animation.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">



    </head>
    <body class="dm-demo3">
        

        <div>
            <nav class="nav clearfix">
                <button class="nav-el" id="el-topleft" data-id="ov-topleft"><span class="fa fa-plus"></span><div class="text">Create League</div></button>
                <button class="nav-el" id="el-topright" data-id="ov-topright"><span class="fa fa-search"></span><div class="text">Join League</div></button>
                <button class="nav-el" id="el-btmleft" data-id="ov-btmleft"><span class="fa fa-list"></span><div class="text">My Leagues</div></button>
                <button class="nav-el" id="el-btmright" data-id="ov-btmright"><span class="fa fa-cog"></span><div class="text">Settings</div></button>
            </nav>

            <section class="overlay" id="ov-topleft">
                <div class="wrap">
                    <h1>Create League</h1>
                    <ul class="input-list style-1">
                        <li>
                          <input type="text" placeholder="Leage Name" class="focus">
                        </li>
                        <li>
                          <input type="text" placeholder="Team Name" class="focus">
                        </li>
                        <li>
                          <input type="text" class="datetimepicker" placeholder="Draft Date" class="focus">
                        </li>
                        <li>
                          <input type="text" placeholder="Duration" class="focus">
                        </li>
                    </ul>
                    
                </div>

                <button class="close"><span class="fa fa-times"></span></button>
            </section>

            <section class="overlay" id="ov-topright">
                <div class="wrap">
                    <h1>Section 2</h1>

                </div>

                <button class="close"><span class="fa fa-times"></span></button>
            </section>

            <section class="overlay" id="ov-btmleft">
                <div class="wrap">
                    <h1>Section 3</h1>

                    
                </div>

                <button class="close"><span class="fa fa-times"></span></button>
            </section>

            <section class="overlay" id="ov-btmright">
                <div class="wrap">
                    <h1>Section 4</h1>

                   
                </div>

                <button class="close"><span class="fa fa-times"></span></button>
            </section>

        </div>
        
        <script src="js/libs/jquery-1.10.2.min.js"></script>
        <script src="js/profile.js"></script>
        <script src="js/libs/jquery.datetimepicker.full.min.js"></script>

        <script>
          $(function() {
            $('.datetimepicker').datetimepicker({
                dayOfWeekStart : 1,
                lang:'en',
                disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
                startDate:  '2016/01/01'
            });
          });
        </script>
    

    </body>
</html>
