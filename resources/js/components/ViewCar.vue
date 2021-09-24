<template>
  <div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Owner Name</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ car.make }}</td>
            <td>{{ car.model }}</td>
            <td>{{ car.year }}</td>
            <td>{{ car.owners.first_name }} {{ car.owners.last_name }}</td>
            <td>
              {{ car.addresses.address }}, {{ car.addresses.country }} ,{{
                car.addresses.city
              }}
              , {{ car.addresses.postal_code }}
            </td>
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
      car: {},
    };
  },
  created() {
    this.axios.get(`/car/${this.$route.params.id}`).then((response) => {
      this.car = response.data;
    });
  },
};
</script>
