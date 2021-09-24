<script>
export default {
  created() {
    this.axios.delete(`/owner/${this.$route.params.id}`);
    this.$router.push("/owners");
  },
};
</script>