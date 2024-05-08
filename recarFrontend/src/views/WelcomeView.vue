<template>
  <div>
    <p>Курсовой проект - <b>reCar</b></p><br>
    <p class="text-justify">CRUD SPA приложение, RESTful веб-сервис аренды автомобилей различных категорий, разработанный с помощью Vue и Laravel. База данных - PostgreSQL.</p><br>
    <b>Подробное описание</b>
    <p class="text-justify">Сервис позволяет брать в аренду доступные автомобили посуточно или на месяц. Авто разделены на категории, по которым можно осуществлять поиск, и представлены в виде удобного каталога. Пользователи имеют возможность оставлять отзывы на автомобили, просматривать свою историю аренды, помечать любимые авто. Можно выбирать комплектацию авто, цвет, доп. опции в конфигураторе.</p>
    <br>
    <p>Автор - <a href="https://github.com/ErikMak">Страница на Github</a></p>
  </div>
  <v-divider class="my-3"></v-divider>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'WelcomeView',
});
</script>