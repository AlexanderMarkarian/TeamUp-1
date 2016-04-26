 <section id="add/drop">
     <div id='load_screen'><img src='../assets/images/other/loading.gif' id='image'></img></div>
    <div class="container" id="addPage">
        <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add Team</h2>
            </div>
        </div>

        <div class="row" id="main-content">
            <div class="col-lg-12">
                <div id="addingTeam">
                    <table id="myTable" class="table table-bordered dt-responsive nowrap" cellspacing="0">
                        <thead>
                            <th>Team</th>
                            <th>Status</th>
                            <th>Sport</th>
                            <th>GP</th>
                            <th>Wins</th>
                            <th>Loses</th>
                            <th>Win Pct.</th>
                        </thead>
                        <tbody id="table-body">                
                        </tbody>
                    </table>
                </div>
                <div id="addedTeam" style="display:none">
                    <table class="table">
                        <caption id="closeAdd">Close</caption>
                        <tr>
                            <th>Teams</th>
                            <th>Status</th>
                            <th>Sport</th>
                            <th>GP</th>
                            <th>Wins</th>
                            <th>Loses</th>
                            <th>Win Pct</th>
                            <th>ID</th>
                        </tr>
                        <tbody id="addbody"></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="slider4"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Drop Team</h2>
                </div>
            </div>
            <div id="droppingTeam">
                <table class="table">
                    <tr>
                        <th>Teams</th>
                        <th>Sport</th>
                        <th>GP</th>
                        <th>Wins</th>
                        <th>Loses</th>
                        <th>Win Pct</th>
                        <th>ID</th>
                    </tr>
                    <tbody id="droppingbody"></tbody>
                </table>
            </div>
            <div id="droppedTeam" style="display:none">
                <table class="table">
                    <caption id="closeDrop">Close</caption>
                    <tr>
                        <th>Teams</th>
                        <th>Sport</th>
                        <th>GP</th>
                        <th>Wins</th>
                        <th>Loses</th>
                        <th>Win Pct</th>
                        <th>ID</th>
                    </tr>
                    <tbody id="dropbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <button id="completeAdd" class="btn btn-lg" disabled>Complete</button>
        </div>
    </div>
</section>
