<template>
  <TitleComponent title="Бронь"/>
  <div class="reservation-grid">
    <v-card
        v-for="(row, index) in userReservations"
        :id="index"
        class="mx-auto w-100"
        flat
        color="#f5f5f5"
    >
      <template v-slot:title>
          <v-badge
              v-if="row.is_active"
              color="green"
              inline
              style="margin-left: -4px;"
          >
            <router-link :to="{name: 'car', params: { brand: row.brand.toLowerCase(), slug: row.model_id}}"
                         class="pa-0">
              <div id="link" class="me-2">
                <p class="link-b font-weight-medium">
                  {{ row.car_name }}
                </p>
              </div>
            </router-link>
          </v-badge>
          <router-link v-else
                       :to="{name: 'car', params: { brand: row.brand.toLowerCase(), slug: row.model_id}}"
                       class="pa-0">
            <div id="link" class="me-2">
              <p class="link-b font-weight-medium">
                {{ row.car_name }}
              </p>
            </div>
          </router-link>
      </template>
      <template v-slot:prepend>
        <v-avatar class="me-3">
          <v-img src="../../src/assets/car-icon.jpg"></v-img>
        </v-avatar>
      </template>
      <template v-slot:subtitle>
        <p>с {{row.date_issue}} по {{row.date_return}}</p>
      </template>
<!--      <template v-slot:append>-->
<!--        <v-btn-->
<!--            color="red-darken-1"-->
<!--            icon="fa-solid fa-trash-can"-->
<!--            size="small"-->
<!--            variant="tonal"-->
<!--            @click="deleteFromFavorites(index, row.id)"-->
<!--        ></v-btn>-->
<!--      </template>-->
    </v-card>
  </div>
</template>

<script lang="ts">
import TitleComponent from "@/components/Title/TitleComp.vue";
import { defineComponent } from "vue";
import {mapActions, mapGetters} from "vuex";
import {ReservationType} from "@/types/IReservationData";

export default defineComponent({
  name: "CarView",
  components: {
    TitleComponent
  },
  methods: {
    ...mapActions(["uploadAllUserReservations"]),
  },
  computed: {
    ...mapGetters(["getUserReservations", "getUserID"]),
    userReservations() : ReservationType[] {
      return this.getUserReservations
    }
  },
  created() {
    const user_id = this.getUserID
    this.uploadAllUserReservations(user_id)
  }
})
</script>

<style lang="scss">
@import '@/assets/theme';
@import 'toastr';

.reservation-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1em;
  .link-b {
    color: black;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  #link:hover {
    p {
      color: $red;
    }
  }
  #link:active {
    p {
      text-decoration: underline;
    }
  }
}
</style>