<template>
  <div class="container">
    <form @submit.prevent="updateOwner">
      <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" v-model="owner.first_name" class="form-control" />
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Last Name</label>
        <input type="text" v-model="owner.last_name" class="form-control" />
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
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
  methods: {
    updateOwner() {
      this.axios
        .put(`/owner/${this.$route.params.id}`, this.owner)
        .then(() => {
          this.$router.push({ name: "owners" });
        });
    },
  },
};
</script>