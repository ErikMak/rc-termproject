<template>
  <a
      class="pa-2"
      :class="{
        'favorite-catalog': catalog,
        'favorite-car-view': carView
      }"
      @click.prevent="addToFavorite"
      href="#">
    <font-awesome-icon
        icon="fa-regular fa-bookmark"
        size="lg"
        style="color: black;"
    />
    <div class="effect-group">
      <span class="effect"></span>
      <span class="effect"></span>
      <span class="effect"></span>
      <span class="effect"></span>
      <span class="effect"></span>
    </div>
  </a>
</template>


<script lang="ts">
import {defineComponent} from "vue";
import UserService from "@/services/UserService";
import toasts from "toastr";
import Api from "@/common/favorites"

export default defineComponent({
  name: 'FavoriteComponent',
  props: {
    catalog: {
      type: Boolean,
      required: false
    },
    carView: {
      type: Boolean,
      required: false
    },
    car_id: {
      type: Number,
      required: true
    }
  },
  methods: {
    addToFavorite() {
      UserService.loginStatus().then(
          response => {
            if(response.data.status == true) {
              const user_id = response.data.data.id
              Api.addToFavorite({
                car_id: this.car_id,
                user_id: user_id
              }, (res: Response) => {
                toasts.success('Машина добавлена в избранное!')
              }, (err: any) => {
                toasts.error(err.error)
              })
            } else {
              toasts.error('Войдите, чтобы добавлять в избранное!')
            }
          }
      )
    }
  }
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import 'toastr';

.favorite-catalog, .favorite-car-view {
  background-color: $yellow;
  border-radius: 5px;
  text-align: center;
  transition: all .3s;
}

.favorite-catalog {
  position: absolute;
  right: 10px;
  z-index: 10;
  width: 35px;
  height: 35px;
  .fa-bookmark {
    margin-bottom: 1px;
  }
}

.favorite-car-view {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  .fa-bookmark {
    margin-bottom: -1px;
  }
}

.favorite-catalog:hover,
.favorite-car-view:hover {
  background-color: $yellow-dirt;
}
.favorite-catalog:active,
.favorite-car-view:active {
  background-color: $yellow-dirt;
}

.favorite-catalog:focus,
.favorite-car-view:focus {
  .effect:before {
    animation: fireworkLine .5s linear .1s;
  }
  .effect:after {
    animation: fireworkPoint .5s linear .1s;
  }
}

@keyframes fireworkLine {
  0% {
    right: 20%;
    transform: scale(0, 0);
  }
  25% {
    right: 20%;
    width: 6px;
    transform: scale(1, 1);
  }
  35% {
    right: 0;
    width: 35%;
  }
  70% {
    right: 0;
    width: 4px;
    transform: scale(1, 1);
  }
  100% {
    right: 0;
    transform: scale(0, 0);
  }
}
@keyframes fireworkPoint {
  30% {
    transform: scale(0, 0);
  }
  60% {
    transform: scale(1, 1);
  }
  100% {
    transform: scale(0, 0);
  }
}

@keyframes bounceIn {
  0% {
    transform: scale(0);
  }
  30% {
    transform: scale(1.25);
  }
  50% {
    transform: scale(0.9)
  }
  70% {
    transform: scale(1.1)
  }
  80% {
    transform: scale(1)
  }
}

.effect-group {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  .effect {
    display: block;
    position: absolute;
    top: 45%;
    left: 50%;
    width: 24px;
    transform-origin: 0px 2px;

    &:nth-child(2) {
      transform: rotate(72deg);
    }

    &:nth-child(3) {
      transform: rotate(72*2deg);
    }

    &:nth-child(4) {
      transform: rotate(72*3deg);
    }

    &:nth-child(5) {
      transform: rotate(72*4deg)
    }

    &:before {
      content: "";
      display: block;
      position: absolute;
      right: 0;
      border-radius: 2px;
      height: 4px;
      background: black;
    }

    &:after {
      content: "";
      display: block;
      position: absolute;
      top: 10px;
      right: 10%;
      border-radius: 50%;
      width: 4px;
      height: 4px;
      background: black;
      transform: scale(0, 0);
    }
  }
}

</style>