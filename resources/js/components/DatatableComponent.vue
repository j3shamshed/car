<template>
  <div>
    <div class="container">
      <table id="dt-table">
        <thead>
          <tr>
            <th>Country</th>
            <th>Population (2017)</th>
            <th>Density (P/Km²)</th>
            <th>Med. Age</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>China</td>
            <td>1,409,517,397</td>
            <td>150</td>
            <td>37</td>
          </tr>

          <!-- 24 more rows here -->
        </tbody>
      </table>
      <div id="chart"></div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    if (document.getElementById("my-datatable")) return; // was already loaded
    var scriptTag = document.createElement("script");
    scriptTag.src =
      "https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js";
    scriptTag.id = "my-datatable";
    document.getElementsByTagName("head")[0].appendChild(scriptTag);
    let vm = this;
    vm.dtHandle = jQuery("#dt-table").DataTable();
    console.log(jQuery("#dt-table").html());
  },
};
</script>