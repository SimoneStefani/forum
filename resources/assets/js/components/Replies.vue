<template>
  <div>
    <div v-for="(reply, index) in items" :key="reply.id">
      <reply :data="reply" @deleted="remove(index)"></reply>
    </div>

    <paginator :dataSet="dataSet" @updated="fetch"></paginator>

    <new-reply @created="add"></new-reply>
  </div>
</template>

<script>
  //import collection from '../mixins/collection'
  import Reply from './Reply.vue'
  import NewReply from './NewReply'

  export default {
    //mixins: ['collection'],

    components: {
      NewReply,
      Reply
    },

    data() {
      return {
        dataSet: false,
        items: []
      }
    },

    created() {
      this.fetch();
    },

    methods: {
      fetch(page) {
        axios.get(this.url(page))
          .then(this.refresh)
      },

      url(page) {
        if (!page) {
          let query = location.search.match(/page=(\d+)/);
          page = query ? query[1] : 1;
        }
        return `${location.pathname}/replies?page=` + page;
      },

      refresh({ data }) {
        this.dataSet = data;
        this.items = data.data;
      },

      add(item) {
        this.items.push(item);

        this.$emit('added');
      },

      remove(index) {
        this.items.splice(index, 1);

        this.$emit('removed');

        flash('Reply was deleted!')
      }
    }
  }
</script>