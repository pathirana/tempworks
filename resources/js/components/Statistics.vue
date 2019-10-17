<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body chart-container">
            <charts :options="chartOptions" :updateArgs="updateArgs"></charts>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Highcharts from "highcharts";
export default {
  data() {
    return {
      updateArgs: [true, true, true],
      chartOptions: {
        chart: {
          type: "line",
          zoomType: "x"
        },
        plotOptions: {
          line: {
            marker: {
              enabled: false
            }
          },
          series: {
            pointPlacement: "on"
          }
        },
        title: {
          text: "Weekly Onbording Retention Curve"
        },
        subtitle: {
          text: "By Gayan Pathirana"
        },
        yAxis: {
          min: 0,
          max: 100,
          title: {
            text: "%"
          }
        },
        legend: {
          layout: "vertical",
          align: "right",
          verticalAlign: "middle"
        },
        xAxis: {
          tickmarkPlacement: "on",
          startOnTick: true,
          categories: [
            "Step 1 (0%)",
            "Step 2 (20%)",
            "Step 3 (40%)",
            "Step 4 (50%)",
            "Step 5 (70%)",
            "Step 6 (90%)",
            "Step 7 (99%)",
            "Step 8 (100%)"
          ]
        },

        series: [{}]
      },
      title: ""
    };
  },
  beforeMount() {
    let self = this;
    axios.get("/api/users-data").then(response => {
      self.chartOptions.series = response.data;
    });
  },
  mounted() {}
};
</script>
