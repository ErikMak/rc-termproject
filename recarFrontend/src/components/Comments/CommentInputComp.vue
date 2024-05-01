<template>
  <v-sheet class="comments-block">
    <div class="comment-label mb-3" for="comment__text">
      <b class="font-weight-medium">Текст комментария</b>
      <p style="line-height: 1.5">
        (Внимание! Грубые и нецензурные комментарии будут удалены)
      </p>
    </div>
    <span class="input-box">
          <textarea id="comment-text"
                    rows="6"
                    placeholder="Введите текст комментария..."
                    name="comment__text"
          >
          </textarea>
        </span>
    <button class="comment-send-button text-subtitle-1 mt-2 text-white">
      Добавить комментарий
    </button>
  </v-sheet>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
  name: 'CommentInputComponent'
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';


.comments-block {
  background-color: $light;
  padding: 15px;
  .comment-label {
    font-size: 12px;
    span {
      color: $gray-600;
    }
  }

  textarea {
    width: 100%;
    font-size: 14px;
    line-height: 18px;
    padding: 5px;
    border: 2px solid $gray-550;
    background-color: white;
    height: 119px;
  }

  .comment-send-button {
    min-height: 46px;
    width: 100%;
    background-color: $gray-550;
  }

  .comment-send-button:active {
    background-color: $red;
  }
}
</style>