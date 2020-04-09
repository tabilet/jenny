<template>
<div>
<h3>{{ names.error_code }}: {{ names.error_string }}</h3>
<FORM id="a_login" @submit.prevent="sendit">
<pre>
   Login: <INPUT TYPE="TEXT"     v-model="f0.login" />
Password: <INPUT TYPE="PASSWORD" v-model="f0.passwd" />
<button TYPE="SUBMIT"> Sign In Now </button>
</pre>
</FORM>
</div>
</template>

<script>
module.exports = {
  props: ['names'],
  data: function() {
    return { f0: {} }
  },
  methods: {
    sendit: function(e) {
      this.f0["role"] = "a";
      this.f0["tag"] = "json";
      $scope.login('a', '', 'topics', this.f0);
    }
  }
}
</script>
