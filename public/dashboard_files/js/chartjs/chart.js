            // line chart data
            var buyerData = {
                labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets : [
                {
                    fillColor : "#ffffff78",
                    strokeColor : "#239FFF",
                    pointColor : "#fff",
                    pointStrokeColor : "#239FFF",
                    data : [500,5000,3000,2000,4000,3000,2000,4000,3000,8000,3000,10000]
                }
            ]
            }
            // get line chart canvas
            var income = document.getElementById('income').getContext('2d');
            // draw line chart
            new Chart(income).Line(buyerData);
            // pie chart data
            var pieData = [
                {
                    value: 1000,
                    color:"#f0f"
                },
                {
                    value : 40,
                    color : "#239FFF"
                },
                {
                    value : 10,
                    color : "#239FFF"
                },
                {
                    value : 30,
                    color : "#239FFF"
                }
            ];
            // pie chart options
            var pieOptions = {
                 segmentShowStroke : false,
                 animateScale : true
            };


// users-flow
    var buyerData = {
        labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets : [
        {
            fillColor : "#ffffff78",
            strokeColor : "#59E12F",
            pointColor : "#fff",
            pointStrokeColor : "#59E12F",
            data : [500,5000,3000,2000,4000,3000,2000,4000,3000,8000,3000,10000]
        }
    ]
    }
    // get line chart canvas
    var income = document.getElementById('users-flow').getContext('2d');
    // draw line chart
    new Chart(income).Line(buyerData);
    // pie chart data
    var pieData = [
        {
            value: 1000,
            color:"#f0f"
        },
        {
            value : 40,
            color : "#239FFF"
        },
        {
            value : 10,
            color : "#239FFF"
        },
        {
            value : 30,
            color : "#239FFF"
        }
    ];
    // pie chart options
    var pieOptions = {
            segmentShowStroke : false,
            animateScale : true
    };
