<template>
  <div class="rating-block position-absolute text-center">
    <p class="font-weight-medium">{{ rating }}</p>
  </div>
</template>

<script lang="ts">
import { defineComponent} from "vue";
import Api from '@/common/comments';
import {ResponseType} from '@/types/IResponse'

interface State {
  rating: string
}

export default defineComponent({
  name: "RatingComponent",
  data: (): State => ({
    rating: '-.-'
  }),
  created() {
    Api.getCarRating({model_id: this.$route.params.slug}, (res: ResponseType) => {
      this.rating = res.data
    })
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';

.rating-block {
  height: 40px;
  width: 40px;
  bottom: 0;
  left: 0;
  border-radius: 5px;
  background-color: $red;
  line-height: 40px;
  p {
    color: white;
    vertical-align: middle;
    display: inline-block;
    line-height: 1.5;
  }
}
</style>