<template>
  <div class="container">
    <form @submit.prevent="updateCar">
      <div class="form-group">
        <label>Make</label>
        <input type="text" v-model="car.make" class="form-control" />
      </div>
      <div class="form-group">
        <label>Model</label>
        <input type="text" v-model="car.model" class="form-control" />
      </div>
      <div class="form-group">
        <label>Year</label>
        <input type="text" v-model="car.year" class="form-control" />
      </div>
      <div class="form-group">
        <label>Address</label>
        <select class="form-control" v-model="car.address_id">
          <option
            v-for="(address, index) in addresses"
            v-bind:key="index"
            :selected="address.id == car.address_id"
            :value="address.id"
          >
            {{ address.address }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label>Owner</label>
        <select class="form-control" v-model="car.owner_id">
          <option
            v-for="(owner, index) in owners"
            v-bind:key="index"
            :selected="owner.id == car.owner_id"
            :value="owner.id"
          >
            {{ owner.first_name }} {{ owner.last_name }}
          </option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      car: {},
      owners: [],
      addresses: [],
    };
  },
  created() {
    this.axios.get(`/car/${this.$route.params.id}`).then((response) => {
      this.car = response.data;
    });
    this.axios.get(`/owner`).then((response) => {
      this.owners = response.data;
    });
    this.axios.get(`/address`).then((response) => {
      this.addresses = response.data;
    });
  },
  methods: {
    updateCar() {
      this.axios
        .put(`/car/${this.$route.params.id}`, this.car)
        .then((response) => {
          this.$router.push({ name: "cars" });
        });
    },
  },
};
</script>