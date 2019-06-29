<main><div class="container">
        <div class="masonry row">
            <div class="col s12">
                <h2>Writers Wiki Admin Page</h2>
            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="#">Users</a></div>
                                <div class="card-metric-value">{{ $users }}</div>
                                <div class="card-metric-change increase">


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-blue" height="100px"></canvas>
                    </div>
                </div>

            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="#">Contributors</a></div>
                                <div class="card-metric-value">{{ $contributors }}</div>
                                <div class="card-metric-change increase">


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-yellow" height="100px"></canvas>
                    </div>
                </div>

            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="#">Links</a></div>
                                <div class="card-metric-value">{{ $links }}</div>
                                <div class="card-metric-change decrease">

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-pink" height="100"></canvas>
                    </div>
                </div>

            </div>

            </div>
        <div class="row">

            <user-grid></user-grid>

        </div>
    </div>
</main>







