 <section id="add/drop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add/Drop</h2>
                <h3 class="section-subheading text-muted">Click on a team logo to add</h3>
            </div>
        </div>

        <div id="overlay" style="visibility:hidden"></div>
        <div id="add-area" style="visibility:hidden">
            <img src="<?= ABSOLUTH_PATH_IMAGES ."other/close.png" ?>" id="close">
            <div class="col-md-4" style="display:inline;">
                <div style="display:block;">
                    <img class="img-responsive img-hover" id="add-image" src="" alt="">
                </div>
                <div style="display:block;">
                    <h5 id="add-name"></h5> 
                </div>
            </div>
            <div class="col-md-2">
                <span id="trade-image"><i class="fa fa-exchange"></i></span>
                <div id="complete-button">
                    <button class="btn btn-danger btn-lg" style="margin-top:30px;"> Complete</button>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <div class="row" id="main-content">
            <div class="col-lg-12 grey-area">
                <table id="myTable" class="table table-bordered dt-responsive nowrap" cellspacing="0">
                    <thead>
                        <th>Team</th>
                        <th>Sport</th>
                        <th>Owner</th>
                        <th>GP</th>
                        <th>Wins</th>
                        <th>Loses</th>
                        <th>Win Pct.</th>
                    </thead>
                    <tbody id="table-body">                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
