<template>
  <div>
    <div class="container">
      <table class="table" v-if="showAddressesAvg">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cars Average Per User</th>
            <th scope="col">Addresses Average Per User</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#</td>
            <td>{{ Number(average[0].cars_avg_per_user).toFixed(2) }}</td>
            <td>{{ Number(average[0].addresses_avg_per_user).toFixed(2) }}</td>
          </tr>
        </tbody>
      </table>

      <table class="table" v-if="showCarsAvg">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cars Average Per Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#</td>
            <td>{{ Number(average[0].car_avg_per_address).toFixed(2) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
// import TableButtonsComponent from "./TableButtonsComponent";

export default {
  data() {
    return {
      average: [],
      showAddressesAvg: false,
      showCarsAvg: false,
    };
  },
  props: ["avgProp"],
  methods: {
    showAverageDetail: function () {
      if (this.avgProp === "addresses") {
        axios.get("/address-details").then(
          function (res) {
            this.average = res.data;
            this.showCarsAvg = true;
          }.bind(this)
        );
      } else if (this.avgProp === "owners") {
        axios.get("/owner-details").then(
          function (res) {
            this.average = res.data;
            this.showAddressesAvg = true;
          }.bind(this)
        );
      }
    },
  },
  created: function () {
    this.showAverageDetail();
  },
};
</script>
