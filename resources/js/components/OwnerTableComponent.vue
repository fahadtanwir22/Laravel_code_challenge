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
          label: "First Name",
          field: "first_name",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Last Name",
          field: "last_name",
          headerAlign: "left",
          align: "left",
        },
        {
          label: "Total Cars",
          field: "total_cars",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: function (r) {
            return r.cars.length;
          },
        },
        {
          label: "Total Addresses",
          field: "total_addresses",
          headerAlign: "left",
          align: "left",
          interpolate: true,
          representedAs: function (r) {
            return r.addresses.length;
          },
        },
        {
          label: "Actions",
          headerAlign: "right",
          align: "right",
          interpolate: true,
          representedAs: function (r) {
            return `<a href="/owners/show/${r.id}" class="btn btn-primary m-1">View</a> <a href="/owners/edit/${r.id}" class="btn btn-warning m-1">Edit</a> <a onclick="return confirm('Are you sure you want to delete this?')" href="/owners/delete/${r.id}" class="btn btn-danger m-1">Delete</a> `;
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
    showOwners: function () {
      axios.get("/owner").then(
        function (res) {
          this.rows = res.data.map((o) => ({ ...o, type: "owner" }));
        }.bind(this)
      );
    },
  },
  created: function () {
    this.showOwners();
  },
};
</script>
