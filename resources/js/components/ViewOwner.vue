<template>
  <div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Number Of Addresses</th>
            <th scope="col">Number Of Cars</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ owner.first_name }}</td>
            <td>{{ owner.last_name }}</td>
            <td>{{ owner.addresses.length }}</td>
            <td>{{ owner.cars.length }}</td>
          </tr>
        </tbody>
      </table>

      <hr />

      <h5>Owner's Addresses</h5>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Country</th>
            <th scope="col">Postal Cars</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(address, index) in owner.addresses" v-bind:key="index">
            <td>{{ address.address }}</td>
            <td>{{ address.city }}</td>
            <td>{{ address.country }}</td>
            <td>{{ address.postal_code }}</td>
          </tr>
        </tbody>
      </table>

      <hr />

      <h5>Owner's Cars</h5>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">year</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(car, index) in owner.cars" v-bind:key="index">
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
      owner: {},
    };
  },
  created() {
    this.axios.get(`/owner/${this.$route.params.id}`).then((response) => {
      this.owner = response.data;
    });
  },
};
</script>
