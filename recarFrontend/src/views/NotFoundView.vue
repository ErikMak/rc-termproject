<template>
  <div class="col-md-9 col-xs-12 px-3 mx-auto">
    <div class="not_found-card bg-black shadow p-4">
      <div class="d-flex align-items-center">
        <h6 class="text-white mb-0">Не найдено</h6>
        <i class="far fa-window-restore"></i>
      </div>
      <hr class="border-3 opacity-100">
      <div class="row">
        <div class="col my-5 text-center">
          <img src="@/assets/pandas.png" class="img-fluid mb-3" alt="Панда">
          <h5 class="text-light">Упс! Страница, которую вы запрашиваете, не существует</h5>
          <small class="text-light">Попробуйте вернуться на <a href="/" style="color:#5faaff;">главную</a></small>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup lang="ts">
import { defineComponent } from 'vue';

defineComponent({
  name: 'NotFoundView',
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

img {
  width: 63px;
}

.not_found-card {
  border-radius: 15px;
  margin-top: 8%;
}

hr {
  color: rgb(63, 65, 66) !important;
}
.fa-window-restore {
  color: rgb(79, 79, 79);
  margin-left: 8px;
}
@media only screen and (max-width: 575.98px) {
  h6, i {
    font-size: 1.1em !important;
  }
}
</style>