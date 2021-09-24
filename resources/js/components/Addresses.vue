<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Addresses</div>

          <div class="card-body">
            <average-detail v-bind:avgProp="addresses"></average-detail>
            <br /><br />
            <address-table-component></address-table-component>
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
      addresses: "addresses",
    };
  },
};
</script>
