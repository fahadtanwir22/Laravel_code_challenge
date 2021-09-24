<template>
  <div class="container">
    <form @submit.prevent="updateAddress">
      <div class="form-group">
        <label>Address</label>
        <input type="text" v-model="address.address" class="form-control" />
      </div>
      <div class="form-group">
        <label>City</label>
        <input type="text" v-model="address.city" class="form-control" />
      </div>
      <div class="form-group">
        <label>Country</label>
        <input type="text" v-model="address.country" class="form-control" />
      </div>
      <div class="form-group">
        <label>Postal Code</label>
        <input type="text" v-model="address.postal_code" class="form-control" />
      </div>
      <div class="form-group">
        <label>Owner</label>
        <select class="form-control" v-model="address.owner_id">
          <option
            v-for="(owner, index) in owners"
            v-bind:key="index"
            :selected="owner.id == address.owner_id"
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
      address: {},
      owners: [],
    };
  },
  created() {
    this.axios.get(`/address/${this.$route.params.id}`).then((response) => {
      this.address = response.data;
    });
    this.axios.get(`/owner`).then((response) => {
      this.owners = response.data;
    });
  },
  methods: {
    updateAddress() {
      this.axios
        .put(`/address/${this.$route.params.id}`, this.address)
        .then(() => {
          this.$router.push({ name: "addresses" });
        });
    },
  },
};
</script>