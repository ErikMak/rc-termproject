<template>
  <div v-for="row in comments" class="comments-item py-3 px-4 rounded mb-3">
    <v-row>
      <v-col>
        <div class="d-flex align-center">
          <b class="me-2 text-decoration-underline">{{ row.user }}</b>
          <small class="text-deep-orange-darken-2">{{ timestamp(row.created_at) }}</small>
        </div>
        <i>Оценка: <strong>{{ row.rating }}</strong></i>
        <p class="mb-0">{{ row.text }}</p>
      </v-col>
    </v-row>
  </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import {mapActions, mapGetters} from "vuex";
import {CommentType} from "@/types/ICommentData";


export default defineComponent({
  name: 'CommentsBlockComponent',
  props: {
    model_id: {
      type: Number,
      required: true
    }
  },
  created() {
    this.uploadComments(this.model_id)
  },
  computed: {
    ...mapGetters(["getComments"]),
    comments() : CommentType[] {
      return this.getComments
    }
  },
  methods: {
    ...mapActions(["uploadComments"]),
    timestamp(timestamp: string) {
      let t = new Date(timestamp)

      let date = t.toLocaleDateString();
      let time = t.toLocaleTimeString('en-US', { hour12: false,
        hour: "numeric",
        minute: "numeric"});

      return date + ' ' + time
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.comments-item {
  background-color: $gray-500;
}

.comments-item p {
  font-size: 0.9em;
}
</style>