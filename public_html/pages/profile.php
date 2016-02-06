

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Profile</h2>
                <h3 class="section-subheading text-muted">
                    <?php
                    foreach($pg['data'] as $user_info){
                        echo $user_info['first_name']. " ".$user_info['last_name'];
                    }
                    ?>
                </h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Create League</h4>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="League Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Team Name" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Draft Date" >
                </div>
                <div class="form-group">
                    <input type="button" style="float:left" class="btn btn-info" value="Submit">
                </div>

            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-exchange fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Join League</h4>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="League ID">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Team Name" >
                </div>
                <div class="form-group">
                    <input type="button" style="float:left" class="btn btn-info" value="Submit">
                </div>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">My Leagues</h4>
                <a href="" class="league_name">League 1</a>
                <a href="" class="league_name">League 2</a>
                <a href="" class="league_name">League 3</a>
            </div>
        </div>
    </div>
</section>



