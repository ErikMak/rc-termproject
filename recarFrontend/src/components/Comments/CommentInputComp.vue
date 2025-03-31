<template>
  <v-sheet class="comments-block">
    <div class="comment-label mb-3" for="comment__text">
      <b class="font-weight-medium">Оцените автомобиль</b>
      <p style="line-height: 1.5">
        (Внимание! Грубые и нецензурные комментарии будут удалены)
      </p>
    </div>
    <span class="input-box">
          <textarea id="comment-text"
                    rows="6"
                    placeholder="Комментарий к отзыву..."
                    name="comment__text"
                    v-model="text"
          >
          </textarea>
        </span>
    <div v-show="errors.text" style="margin-top: -5px;" class="mb-2">
      <small class="text-red v-messages__message">{{ errors.text }}</small>
    </div>
    <div class="d-flex">
      <v-rating
          class="my-1"
          v-model="rating"
          empty-icon="fa-regular fa-star"
          full-icon="fa-solid fa-star"
          half-icon="fa-solid fa-star-half-stroke"
          half-increments
          density="comfortable"
          active-color="deep-orange-lighten-2"
          color="#8d8a8a"
      ></v-rating>
    </div>
    <button @click="sendComment" class="comment-send-button text-subtitle-1 mt-2 text-white">
      Добавить отзыв
    </button>
  </v-sheet>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import Api from "@/common/comments"
import {mapMutations} from "vuex";
import type {ResponseType} from '@/types/IResponse'
import {UseCommentValidation} from "@/mixins/CommentValidationMixins";
import {createErrorChain} from "@/services/ErrorHandler";

interface State {
  text: string,
  rating: number,
}

export default defineComponent({
  name: 'CommentInputComponent',
  props: {
    car_id: {
      required: true
    }
  },
  data: (): State => ({
    text: '',
    rating: 0,
  }),
  methods: {
    ...mapMutations(["pushComment"]),
    validate(callback: any) {
      let isCommentValid = this.commentValidation.checkCommentText(this);

      if(isCommentValid) {
        callback()
      }
    },
    sendComment() {
      this.validate(() => {
        Api.addComment({
          car_id: this.car_id,
          text: this.text,
          rating: this.rating.toFixed(1),
        }, (res: ResponseType) => {
          this.pushComment(res.data)
        }, (err: any) => {
          if (err.message === 'token_error') {
            this.$toastr.error('Войдите в аккаунт, чтобы оставлять отзыв!')
          } else {
            const properties = [
              'car_id', 'rating', 'text'
            ]

            const errorHandler = createErrorChain(properties, (msg: string[]) => {
              this.$toastr.error(msg.pop())
            })

            errorHandler.handle(err)
          }
        })
      })
    },
  },
  setup() {
    const commentValidation = new UseCommentValidation()

    return {
      commentValidation,
      errors: commentValidation.getErrors()
    }
  }
})
</script>


<style lang="scss">
@import '@/assets/toasts';
</style>

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