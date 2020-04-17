<template>
<div>
<table>
<thead><tr><th></th>
<th>Poll_id</th>
<th>Question</th>
<th>Created</th>
<th></th>
</tr>
</thead>
<tbody><tr v-for="item in names.data">
<td>

  <p-question-edit v-if="showModal && currentID===item.poll_id" v-bind:single="currentData" v-bind:id="currentID" @close="showModal=false">
  </p-question-edit>
  <button id="show-modal" @click="openModal(item.poll_id)">{{ item.poll_id }}</button>
</td>
<td>{{ item.poll_id }}</td>
<td>{{ item.question }}</td>
<td>{{ item.created }}</td>
<td></td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
module.exports = {
  name: 'p-question-topics',
  components: {
    'p-question-edit': httpVueLoader('./edit.vue')
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
      $scope.ajaxPage("p", "question", {action:"edit", poll_id:id}, "GET", mylanding);
      this.currentID = id;
      this.showModal = true;
    }
  }
}
</script>
