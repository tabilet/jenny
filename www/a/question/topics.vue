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

  <a-question-edit v-if="showModal && currentID===item.poll_id" v-bind:single="currentData" v-bind:id="currentID" @close="showModal=false">
  </a-question-edit>
  <button id="show-modal" @click="openModal(item.poll_id)">{{ item.poll_id }}</button>
</td>
<td>{{ item.poll_id }}</td>
<td>{{ item.question }}</td>
<td>{{ item.created }}</td>
<td><button @click="deleteItem(item.poll_id)">Delete</button></td>
</tr>
</tbody>
</table>
<p>
<a-question-startnew v-if="newModal" @close="newModal=false">
</a-question-startnew>
<button id="new-modal" @click="newModal=true">Add New</button>
</p>
</div>
</template>

<script>
module.exports = {
  name: 'a-question-topics',
  components: {
    'a-question-edit': httpVueLoader('./edit.vue'),
    'a-question-startnew': httpVueLoader('./startnew.vue')
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
      $scope.ajaxPage("a", "question", {action:"edit", poll_id:id}, "GET", mylanding);
      this.currentID = id;
      this.showModal = true;
    },
    deleteItem: function(id) {
      if (confirm("Are you sure to delete this ID: " + id + "?")) {
        $scope.ajaxPage("a", "question", {action:"delete", poll_id:id}, "GET", {operator:"delete", "id_name":"poll_id"});
      }
    }
  }
}
</script>
