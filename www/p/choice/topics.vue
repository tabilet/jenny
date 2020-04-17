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
</td>
<td>{{ item.choice_id }}</td>
<td>{{ item.poll_id }}</td>
<td>{{ item.choice }}</td>
<td>{{ item.votes }}</td>
<td></td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
module.exports = {
  name: 'p-choice-topics',
  props: ['names'],
  data: function() {
    return {
        newModal: false,
        showModal: false,
        currentID: 0,
        currentData: null,
    };
  }
}
</script>
