
<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
              <button class="modal-default-button" @click="$emit('close')">x
              </button>
            <slot name="header"></slot>
          </div>

          <div class="modal-body">
            <slot name="body"></slot>
Tabilet_id: {{ f0.tabilet_id }}
RECALL_NUMBER_NUM: {{ f0.RECALL_NUMBER_NUM }}
YEAR: {{ f0.YEAR }}
MANUFACTURER_RECALL_NO_TXT: {{ f0.MANUFACTURER_RECALL_NO_TXT }}
CATEGORY_ETXT: {{ f0.CATEGORY_ETXT }}
CATEGORY_FTXT: {{ f0.CATEGORY_FTXT }}
MAKE_NAME_NM: {{ f0.MAKE_NAME_NM }}
MODEL_NAME_NM: {{ f0.MODEL_NAME_NM }}
UNIT_AFFECTED_NBR: {{ f0.UNIT_AFFECTED_NBR }}
SYSTEM_TYPE_ETXT: {{ f0.SYSTEM_TYPE_ETXT }}
SYSTEM_TYPE_FTXT: {{ f0.SYSTEM_TYPE_FTXT }}
NOTIFICATION_TYPE_ETXT: {{ f0.NOTIFICATION_TYPE_ETXT }}
NOTIFICATION_TYPE_FTXT: {{ f0.NOTIFICATION_TYPE_FTXT }}
COMMENT_ETXT: {{ f0.COMMENT_ETXT }}
COMMENT_FTXT: {{ f0.COMMENT_FTXT }}
RECALL_DATE_DTE: {{ f0.RECALL_DATE_DTE }}

          </div>

          <div class="modal-footer">
            <slot name="footer">
              <button class="modal-default-button" @click="$emit('close')"> close
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
  module.exports = {
    name: 'p-car-edit',
    props: ['single', 'id'],
    watch: {
        single: function () {
            this.f0 = this.single
            for (var k in this.f0) {
                if (this.f0[k]===null || this.f0[k]===undefined) {
                    delete this.f0[k];
                }
            }
        }
    },
    data : function() {
        return { f0: {} };
    },
    methods: {
      close() {
        this.$emit('close');
      },
    },
  }
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 600px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
