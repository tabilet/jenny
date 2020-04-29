<template>
<div>
<table>
<thead><tr><th></th>
<th>Tabilet_id</th>
<th>RECALL_NUMBER_NUM</th>
<th>YEAR</th>
<th>MANUFACTURER_RECALL_NO_TXT</th>
<th>CATEGORY_ETXT</th>
<th>CATEGORY_FTXT</th>
<th>MAKE_NAME_NM</th>
<th>MODEL_NAME_NM</th>
<th>UNIT_AFFECTED_NBR</th>
<th>SYSTEM_TYPE_ETXT</th>
<th>SYSTEM_TYPE_FTXT</th>
<th>NOTIFICATION_TYPE_ETXT</th>
<th>NOTIFICATION_TYPE_FTXT</th>
<th>COMMENT_ETXT</th>
<th>COMMENT_FTXT</th>
<th>RECALL_DATE_DTE</th>
<th></th>
</tr>
</thead>
<tbody><tr v-for="item in names.data">
<td>

  <p-car-edit v-if="showModal && currentID===item.tabilet_id" v-bind:single="currentData" v-bind:id="currentID" @close="showModal=false">
  </p-car-edit>
  <button id="show-modal" @click="openModal(item.tabilet_id)">{{ item.tabilet_id }}</button>
</td>
<td>{{ item.tabilet_id }}</td>
<td>{{ item.RECALL_NUMBER_NUM }}</td>
<td>{{ item.YEAR }}</td>
<td>{{ item.MANUFACTURER_RECALL_NO_TXT }}</td>
<td>{{ item.CATEGORY_ETXT }}</td>
<td>{{ item.CATEGORY_FTXT }}</td>
<td>{{ item.MAKE_NAME_NM }}</td>
<td>{{ item.MODEL_NAME_NM }}</td>
<td>{{ item.UNIT_AFFECTED_NBR }}</td>
<td>{{ item.SYSTEM_TYPE_ETXT }}</td>
<td>{{ item.SYSTEM_TYPE_FTXT }}</td>
<td>{{ item.NOTIFICATION_TYPE_ETXT }}</td>
<td>{{ item.NOTIFICATION_TYPE_FTXT }}</td>
<td>{{ item.COMMENT_ETXT }}</td>
<td>{{ item.COMMENT_FTXT }}</td>
<td>{{ item.RECALL_DATE_DTE }}</td>
<td></td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
module.exports = {
  name: 'p-car-topics',
  components: {
    'p-car-edit': httpVueLoader('./edit.vue')
  },
  props: ['names'],
  data: function() {
    return {
        newModal: false,
        showModal: false,
        currentID: 0,
        currentData: null,
    };
  },
  methods: {
    openModal: function(id) {
      that = this;
      var mylanding = function(x) {
        that.currentData = JSON.parse(JSON.stringify(x.data[0]));
      };
      $scope.ajaxPage("p", "car", {action:"edit", tabilet_id:id}, "GET", mylanding);
      this.currentID = id;
      this.showModal = true;
    }
  }
}
</script>
