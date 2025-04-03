<template>
  <v-row>
    <v-col class="pb-0">
      <div class="car-header-wrapper position-relative">
        <div class="back-arrow position-absolute">
          <router-link class="back-link" :to="{name: 'catalog', params: {brand: this.$route.params.brand}}">
          <font-awesome-icon
              icon="fa-solid fa-chevron-left"
              size="lg"
          />
          </router-link>
        </div>
        <CarHeaderPreloaderComponent
            v-show="preloaderShow"
        />
        <div v-show="!preloaderShow" class="text-center">
          <h2 class="font-weight-medium">{{ details.brand + ' ' + details.name }}</h2>
        </div>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col class="pb-0 position-relative">
      <div class="img-wrapper position-relative">
        <!--   Image Preloader   -->
        <div v-show="preloaderShow" class="loader position-absolute"></div>
        <v-img
            v-show="!preloaderShow"
            :src="previewPic(details.img)"
            aspect-ratio="16/9"
            class="px-3"
        >
        </v-img>
        <!-- Динамическая загрузка компонента RatingComponent -->
        <component v-if="RatingBlock" :is="RatingBlock" :model_id="details.model_id"/>
        <div class="price-block position-absolute text-center">
          <p class="font-weight-medium">от <b class="font-weight-bold">{{details.min_price}}&#8381;</b>/день</p>
        </div>
        <FavoriteComponent :car-view="true" :car_id="details.model_id"/>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <h2 class="mb-4">Основные параметры</h2>
      <div class="car-specs-wrapper">
        <div class="car-specs pa-3">
          <div class="car-spec-col mb-1">
            <small class="label">Категория</small>
            <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
            <p v-show="!preloaderShow" class="text">{{details.category}}</p>
          </div>
          <div class="car-spec-col mb-1">
            <small class="label">Тип</small>
            <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
            <p v-show="!preloaderShow" class="text">{{details.type}}</p>
          </div>
          <div class="car-spec-col mb-1">
            <small class="label">Год выпуска</small>
            <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
            <p v-show="!preloaderShow" class="text">{{details.year}}</p>
          </div>
        </div>
      </div>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <h2 class="mb-4">Дополнительные сведения</h2>
      <v-table density="compact" class="car-another-specs">
        <thead></thead>
        <tbody>
          <tr>
            <td class="px-0 pb-3">Страна</td>
            <td class="px-0 pb-3">
              <div class="d-flex align-center">
                <img class="country-flag" :src="itemFlag(details.flag)" alt="flag">
                <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
                <p v-show="!preloaderShow">{{details.country}}</p>
              </div>
            </td>
          </tr>
          <tr>
            <td class="px-0 py-3">
              <p>Объем бака, л</p>
            </td>
            <td class="px-0 py-3">
              <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
              <p v-show="!preloaderShow">{{ details.tank }}</p>
            </td>
          </tr>
          <tr>
            <td class="px-0 py-3">
              <p>Масса, кг</p>
            </td>
            <td class="px-0 py-3">
              <div v-show="preloaderShow" class="small-text effect-shine rounded-1"></div>
              <p v-show="!preloaderShow">{{ details.weight }}</p>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <!-- Динамическая загрузка компонента CarBookModalComponent -->
      <component v-if="CarBookModalBlock" :is="CarBookModalBlock" :model_id="details.model_id"/>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <CommentInputComponent :car_id="details.model_id"/>
    </v-col>
  </v-row>
  <v-row>
    <v-col>
      <!-- Динамическая загрузка компонента CommentsBlockComponent -->
      <component v-if="CommentsBlock" :is="CommentsBlock" :model_id="details.model_id"/>
    </v-col>
  </v-row>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent, defineAsyncComponent, markRaw } from "vue";
import CommentInputComponent from "@/components/Comments/CommentInputComp.vue";
import Api from '@/common/cars'
import FavoriteComponent from "@/components/Favorite/FavoriteComp.vue";
import CarHeaderPreloaderComponent from "@/components/Car/CarHeaderPreloaderComp.vue";
import type ResponseType from '@/types/IResponse';
import DataMixins from "@/mixins/DataMixins";
import {FullCarType} from "@/types/IFullCarData";

interface State {
  details: FullCarType,
  preloaderShow: boolean,
  CommentsBlock: any
  RatingBlock: any
  CarBookModalBlock: any
}

export default defineComponent({
  name: "CarView",
  components: {
    CarHeaderPreloaderComponent,
    FavoriteComponent,
    CommentInputComponent,
    TitleComponent
  },
  data: (): State => ({
    details: {
      model_id: 0,
      name: '',
      category: '',
      brand: '',
      type: '',
      min_price: '',
      country: '',
      weight: 0,
      tank: '',
      year: 0,
      flag: '',
      img: ''
    },
    preloaderShow: true,
    CommentsBlock: null,
    RatingBlock: null,
    CarBookModalBlock: null
  }),
  mixins: [DataMixins],
  methods: {
    async loadCommentsBlock() {
      // Динамически импортируемый компонент SimilarCardsComponent
      this.CommentsBlock = markRaw(defineAsyncComponent(() =>
          import("@/components/Comments/CommentsBlockComp.vue")
      ));
    },
    async loadRatingBlock() {
      // Динамически импортируемый компонент RatingComp
      this.RatingBlock = markRaw(defineAsyncComponent(() =>
          import("@/components/Car/RatingComp.vue")
      ));
    },
    async loadCarBookModalBlock() {
      // Динамически импортируемый компонент RatingComp
      this.CarBookModalBlock = markRaw(defineAsyncComponent(() =>
          import("@/components/Modal/CarBookModalComp.vue")
      ));
    },
    uploadCar(slug: any) {
      return new Promise((resolve: any) => {
        Api.getCarById({id: slug}, (res: ResponseType) => {
          this.details = res.data
          this.loadCommentsBlock()
          this.loadRatingBlock()
          this.loadCarBookModalBlock()
          resolve()
        }, (err: any) => {
          if(err.response.status == 404) {
            this.$router.push({name: '404'})
          }
        })
      })
    },
  },
  created() {
    this.uploadCar(this.$route.params.slug).then(() => {
      this.preloaderShow = false;
    })
  },
  beforeRouteUpdate(to: any, from: any, next: any) {
    if (to.params.slug !== from.params.slug) {
      this.preloaderShow = true;
      this.uploadCar(to.params.slug).then(() => {
        this.preloaderShow = false;
        next();
      });
    } else {
      next();
    }
  },
})
</script>

<style lang="scss" scoped>
@import '@/assets/theme';
@import '@/assets/mixins';

@include loader;
@include shine-animation;

.small-text {
  margin-top: 4px;
  background-color: rgb(236, 236, 236);
  width: 70px;
  height: 12px;
}

.back-arrow {
  top: 6px;
  .back-link {
    color: $gray-600;
    cursor: pointer;
  }
  .back-link:hover {
    transition: .2s;
    color: black;
  }
}

.img-wrapper {
  min-height: 203px;
}

.price-block {
  height: 40px;
  top: 0;
  left: 0;
  background-color: $salad;
  font-size: 18px;
  padding: 0 4px;
  line-height: 40px;
  p {
    vertical-align: middle;
    display: inline-block;
    line-height: 1.5;
  }
}

.car-specs-wrapper {
  border: 1px solid $gray-550;
  .car-specs {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .car-spec-col {
    .label {
      font-size: 11px;
      line-height: 1.2;
      color: $gray-600;
    }
    .text {
      margin-top: -4px;
    }
  }
}

.car-another-specs {
  .country-flag {
    margin-right: 7px;
    max-height: 15px;
  }
}
</style>