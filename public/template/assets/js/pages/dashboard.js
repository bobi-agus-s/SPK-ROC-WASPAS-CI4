// -------------- BANJAREJO ------------------
var alt_banjarejo = []
var hasil_banjarejo = []

$.get('banjarejo', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_banjarejo.push(dta.nama_penduduk);
    hasil_banjarejo.push(dta.hasil);
  })

});

$(document).on('click', '#Banjarejo-tab', function(event) {
  var banjarejo = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_banjarejo,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_banjarejo
    },
  }

  var chartBanjarejo = new ApexCharts(
    document.querySelector("#Banjarejo"),
    banjarejo
  )
  chartBanjarejo.render()
});

// -------------- Mekarsari ------------------
var alt_mekarsari = []
var hasil_mekarsari = []

$.get('mekarsari', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_mekarsari.push(dta.nama_penduduk);
    hasil_mekarsari.push(dta.hasil);
  })

});

$(document).on('click', '#Mekarsari-tab', function(event) {
  var mekarsari = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_mekarsari,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_mekarsari
    },
  }

  var chartMekarsari = new ApexCharts(
    document.querySelector("#Mekarsari"),
    mekarsari
  )
  chartMekarsari.render()
});

// -------------- Krajan ------------------
var alt_krajan = []
var hasil_krajan = []

$.get('krajan', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_krajan.push(dta.nama_penduduk);
    hasil_krajan.push(dta.hasil);
  })

});

$(document).on('click', '#Krajan-tab', function(event) {
  var krajan = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_krajan,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_krajan
    },
  }

  var chartKrajan = new ApexCharts(
    document.querySelector("#Krajan"),
    krajan
  )
  chartKrajan.render()
});


// -------------- Mulyosari ------------------
var alt_mulyosari = []
var hasil_mulyosari = []

$.get('mulyosari', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_mulyosari.push(dta.nama_penduduk);
    hasil_mulyosari.push(dta.hasil);
  })

});

$(document).on('click', '#Mulyosari-tab', function(event) {
  var mulyosari = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_mulyosari,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_mulyosari
    },
  }

  var chartMulyosari = new ApexCharts(
    document.querySelector("#Mulyosari"),
    mulyosari
  )
  chartMulyosari.render()
});


// -------------- Margodadi ------------------
var alt_margodadi = []
var hasil_margodadi = []

$.get('margodadi', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_margodadi.push(dta.nama_penduduk);
    hasil_margodadi.push(dta.hasil);
  })

});

$(document).on('click', '#Margodadi-tab', function(event) {
  var margodadi = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_margodadi,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_margodadi
    },
  }

  var chartMargodadi = new ApexCharts(
    document.querySelector("#Margodadi"),
    margodadi
  )
  chartMargodadi.render()
});



// -------------- Mekarindah ------------------
var alt_mekarindah = []
var hasil_mekarindah = []

$.get('mekarindah', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_mekarindah.push(dta.nama_penduduk);
    hasil_mekarindah.push(dta.hasil);
  })

});

$(document).on('click', '#Mekarindah-tab', function(event) {
  var mekarindah = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_mekarindah,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_mekarindah
    },
  }

  var chartMekarindah = new ApexCharts(
    document.querySelector("#Mekarindah"),
    mekarindah
  )
  chartMekarindah.render()
});


// -------------- Wadah ------------------
var alt_wadah = []
var hasil_wadah = []

$.get('wadah', function(data, status) {
  var dt = $.parseJSON(data);
  dt.forEach(dta => {
    alt_wadah.push(dta.nama_penduduk);
    hasil_wadah.push(dta.hasil);
  })

});

$(document).on('click', '#Wadah-tab', function(event) {
  var wadah = {
    annotations: {
      position: "back",
    },
    dataLabels: {
      enabled: false,
    },
    chart: {
      type: "bar",
      height: 300,
    },
    fill: {
      opacity: 1,
    },
    plotOptions: {},
    series: [
      {
        name: "hasil",
        data: hasil_wadah,
      },
    ],
    colors: "#435ebe",
    xaxis: {
      categories: alt_wadah
    },
  }

  var chartWadah = new ApexCharts(
    document.querySelector("#Wadah"),
    wadah
  )
  chartWadah.render()
});



var dusun = []
var total = []

$.get('getDusun', function(data, status) {  
  var dt = $.parseJSON(data);
  dt.forEach(dsn => {
    dusun.push(dsn.nama_dusun)
    var url = "totalDusun/"+dsn.id_dusun

    $.get(url, function(data2, status2) {
      var dt2 = $.parseJSON(data2)

      dt2.forEach(dt_dusun => {
        total.push(parseInt(dt_dusun.nik))
      })
    });

  });
});


// Fungsi untuk menghasilkan warna acak
function getRandomColor() {
  const letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

// Array untuk menyimpan warna-warna acak
const randColor = []
for (let i = 0; i < 7; i++) {
  randColor.push(getRandomColor());
}

//console.log(total) [ 5, 4, 5, 6, 5, 4, 4 ]
//console.log(dusun) [ "Banjarejo", "Mekarsari", "Krajan", "Mulyosari", "Margodadi", "Mekarindah", "Wadah" ]

let informasiDusun = {
  series: [ 5, 4, 5, 6, 5, 4, 4 ],
  labels: [ "Banjarejo", "Mekarsari", "Krajan", "Mulyosari", "Margodadi", "Mekarindah", "Wadah" ],
  colors: ["#FFB6C1", "#FF0000", "#0000FF", "#FF00FF", "#ADFF2F", "#FFA500", "#FFA07A"],
  chart: {
    type: "donut",
    width: "100%",
    height: "350px",
  },
  legend: {
    position: "bottom",
  },
  plotOptions: {
    pie: {
      donut: {
        size: "30%",
      },
    },
  },
}

var informasi_dusun = new ApexCharts(
  document.getElementById("informasi-dusun"),
  informasiDusun
)

informasi_dusun.render()


