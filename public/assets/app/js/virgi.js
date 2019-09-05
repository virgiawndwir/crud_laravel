var d = new Date().getMonth() + 1;
if(d % 2 == 0){
    var tgl=[];
    for(var i = 1; i <= 30; i++){
        tgl.push(i)
    }        
}else{
    var tgl=[];
    for(var i = 1; i <= 31; i++){
        tgl.push(i)
    }
}
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
type: 'line',
data: {
    labels: tgl,
    datasets: [
            {
            // title: 'Hari ke',
            label: 'Aktivitas yang sudah dikerjakan hari ini ',
            lineTension: 0,
            backgroundColor: "rgba(2,117,216,0.3)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 4,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 20,
            pointBorderWidth: 2,
            data: []
        }
    ]
},

// Configuration options go here
options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 0
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 30,
          maxTicksLimit: 20
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    title: {
      display: true,
      position: 'left',
      text: 'Custom Chart Title'
    },
    legend: {
      display: true,
      position:'bottom',
      text: 'asdf',
      labels: {
          // fontColor: 'rgb(255, 99, 132)'
      }
    },
    layout: {
      padding: {
          left: 10,
          right: 50,
          top: 0,
          bottom: 0
      },
      margin: {

      }
    }
  }
});