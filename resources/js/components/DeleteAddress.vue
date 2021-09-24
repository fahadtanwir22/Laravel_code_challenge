<script>
export default {
  created() {
    this.axios.delete(`/address/${this.$route.params.id}`);
    this.$router.push("/addresses");
  },
};
</script>