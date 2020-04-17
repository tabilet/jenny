<template>
<div>
<table>
<thead><tr><th></th>
<th>Choice_id</th>
<th>Poll_id</th>
<th>Choice</th>
<th>Votes</th>
<th></th>
</tr>
</thead>
<tbody><tr v-for="item in names.data">
<td>

  <a-choice-edit v-if="showModal && currentID===item.choice_id" v-bind:single="currentData" v-bind:id="currentID" @close="showModal=false">
  </a-choice-edit>
  <button id="show-modal" @click="openModal(item.choice_id)">{{ item.choice_id }}</button>
</td>
<td>{{ item.choice_id }}</td>
<td>{{ item.poll_id }}</td>
<td>{{ item.choice }}</td>
<td>{{ item.votes }}</td>
<td><button @click="deleteItem(item.choice_id)">Delete</button></td>
</tr>
</tbody>
</table>
<p>
<a-choice-startnew v-if="newModal" @close="newModal=false">
</a-choice-startnew>
<button id="new-modal" @click="newModal=true">Add New</button>
</p>
</div>
</template>

<script>
module.exports = {
  name: 'a-choice-topics',
  components: {
    'a-choice-edit': httpVueLoader('./edit.vue'),
    'a-choice-startnew': httpVueLoader('./startnew.vue')
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
      $scope.ajaxPage("a", "choice", {action:"edit", choice_id:id}, "GET", mylanding);
      this.currentID = id;
      this.showModal = true;
    },
    deleteItem: function(id) {
      if (confirm("Are you sure to delete this ID: " + id + "?")) {
        $scope.ajaxPage("a", "choice", {action:"delete", choice_id:id}, "GET", {operator:"delete", "id_name":"choice_id"});
      }
    }
  }
}
</script>
