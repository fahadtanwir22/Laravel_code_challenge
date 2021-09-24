<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Owners</div>

          <div class="card-body">
            <average-detail v-bind:avgProp="owners"></average-detail>
            <br /><br />
            <owner-table-component></owner-table-component>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      owners: "owners",
    };
  },
};
</script>
