<section id="trades">
    <div class="container">
        <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Trades</h2>
                <h3 class="section-subheading text-muted">Let's Make a Deal</h3>
            </div>
        </div>
        <div class="row" id="main-content">
            <div class="col-lg-12">
                <div id="tradingTeam">
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
                        <tbody id="tradebody"></tbody>
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
                <div>
                    <div class="btn-group">
                      <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select a team to trade with <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" id="teamlist">
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
