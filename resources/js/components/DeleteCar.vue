<script>
export default {
  created() {
    this.axios.delete(`/car/${this.$route.params.id}`);
    this.$router.push("/cars");
  },
};
</script>