<template>
  <div>
    <bootstrap-4-datatable
      :columns="columns"
      :data="rows"
      :filter="filter"
      :per-page="perPage"
      class="table-bordered"
    ></bootstrap-4-datatable>
    <bootstrap-4-datatable-pager
      v-model="page"
      type="abbreviated"
    ></bootstrap-4-datatable-pager>
  </div>
</template>

<script>
export default {
  data() {
    return {
      columns: [
        {
          label: "ID",
          field: "id",
          align: "center",
        },
        {
          label: "Make",
          field: "make",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Model",
          field: "model",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Year",
          field: "year",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Owner Name",
          field: "owner_name",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: function (r) {
            return r.owners.first_name + " " + r.owners.last_name;
          },
        },
        {
          label: "Address",
          field: "address",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: function (r) {
            return r.addresses.address;
          },
        },
        {
          label: "Actions",
          headerAlign: "right",
          align: "right",
          interpolate: true,
          representedAs: function (r) {
            return `<a href="/car/show/${r.id}" class="btn btn-primary m-1">View</a> <a href="/car/edit/${r.id}" class="btn btn-warning m-1">Edit</a> <a onclick="return confirm('Are you sure you want to delete this?')" href="/car/delete/${r.id}" class="btn btn-danger m-1">Delete</a> `;
          },
        },
      ],
      rows: [],
      page: 1,
      filter: "",
      perPage: 20,
      loading: true,
    };
  },
  methods: {
    showCars: function () {
      axios.get("/car").then(
        function (res) {
          this.rows = res.data.map((o) => ({ ...o, type: "car" }));
        }.bind(this)
      );
    },
  },
  created: function () {
    this.showCars();
  },
};
</script>
