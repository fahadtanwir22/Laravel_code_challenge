<template>
  <div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Address</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Postal Code</th>
            <th scope="col">Owner Name</th>
            <th scope="col">Number Of Cars</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ address.address }}</td>
            <td>{{ address.country }}</td>
            <td>{{ address.city }}</td>
            <td>{{ address.postal_code }}</td>
            <td>
              {{ address.owners.first_name }} {{ address.owners.last_name }}
            </td>
            <td>{{ address.cars.length }}</td>
          </tr>
        </tbody>
      </table>

      <hr />

      <h5>Cars With This Address</h5>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">year</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(car, index) in address.cars" v-bind:key="index">
            <td>{{ car.make }}</td>
            <td>{{ car.make }}</td>
            <td>{{ car.year }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      address: {},
    };
  },
  created() {
    this.axios.get(`/address/${this.$route.params.id}`).then((response) => {
      this.address = response.data;
    });
  },
};
</script>
