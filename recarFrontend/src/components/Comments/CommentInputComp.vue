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
    <div v-if="errorText" style="margin-top: -5px;" class="mb-2">
      <small class="text-red">{{ errorText }}</small>
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
import UserService from "@/services/UserService";
import toasts from "toastr";
import Api from "@/common/comments"
import {mapMutations} from "vuex";

interface State {
  text: string,
  rating: number,
  errorText: string
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
    errorText: ''
  }),
  methods: {
    ...mapMutations(["pushComment"]),
    checkCommentText() {
      const rv_text = /^[a-zA-Zа-яА-Я0-9\s\.,!?()-]{1,500}$/;
      let valid = false

      if(this.text == '') {
        this.errorText = 'Комментарий не может быть пустым'
      } else if (!rv_text.test(this.text)) {
        this.errorText = 'Присутсвуют недоспутимые символы или длина комментария превышает 500 символов'
      } else {
        valid = true
        this.errorText = ''
      }

      return valid
    },
    sendComment() {
      let isCommentValid = this.checkCommentText();

      if(isCommentValid) {
        UserService.loginStatus().then(
            response => {
              if(response.data.status == true) {
                const user_id = response.data.data.id
                const user_name = response.data.data.login
                const rating = parseFloat(this.rating).toFixed(1)

                Api.addComment({
                  car_id: this.car_id,
                  user_id: user_id,
                  text: this.text,
                  rating: rating,
                }, (res: Response) => {
                  this.pushComment({
                    created_at: +new Date(),
                    id: 0,
                    rating: rating,
                    text: this.text,
                    user: user_name
                  })

                  toasts.success(res.message)
                }, (err: any) => {
                  toasts.error(err.error)
                })
              } else {
                toasts.error('Войдите, чтобы оставлять отзывы')
              }
            }
        )
      }
    },
  }
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