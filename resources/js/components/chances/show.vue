<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <!-- Main content -->
      <div class="row">
        <div class="col-lg-8">
          <!-- Details -->
          <div class="card mb-4">
            <swiper
              :spaceBetween="30"
              :effect="'fade'"
              :navigation="true"
              :pagination="{
                clickable: true,
              }"
              :modules="modules"
              class="mySwiper"
            >
              <swiper-slide
                class="swiper-slide"
                v-for="image in chance.images"
                :key="image"
                ><img :src="image.image"
              /></swiper-slide>
            </swiper>
          </div>
          <!-- Payment -->
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="h6">العنوان</h3>
                  <p>
                    {{ chance.title }}
                  </p>
                </div>
                <div class="col-lg-6">
                  <h3 class="h6">الوصف</h3>
                  <p>
                    {{ chance.desc }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Customer Notes -->
          <div class="card mb-4">
            <div class="card-body">
              <h3 class="h6">منافذ الامتياز</h3>
              <hr />
              <p>
                {{ chance.outlets }}
              </p>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <h3 class="h6">معلومات مانح الامتياز</h3>
              <hr />
              <h3 class="h6">{{ chance.provider }}</h3>
              {{ chance.email }}<br />
              {{ chance.number }}<br />
              <a :href="chance.link" target="_blank">Link</a><br />
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <h3 class="h6">معلومات الامتياز</h3>
              <hr />
              <strong>القطاع</strong> : {{ chance.cat }} <br />
              <strong>البلد</strong> : {{ chance.country }} <br />
              <strong>السعر</strong> : {{ chance.price }} <br />
              <strong>عدد الفروع</strong> : {{ chance.branches }}
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <h3 class="h6">المسؤول عن المتقدمين</h3>
              <hr />
              <p>
                {{ chance.resp }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";

// import required modules
import { EffectFade, Navigation, Pagination } from "swiper";

export default {
  name: "show_chance",
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    return {
      modules: [EffectFade, Navigation, Pagination],
    };
  },
  data() {
    return {
      chance: {},
      id: this.$route.params.id,
      loading: false,
    };
  },
  mounted() {
    this.fetchChance();
  },
  methods: {
    async fetchChance() {
      this.loading = true;
      await axios
        .get(`/api/show/${this.id}`)
        .then((res) => {
          this.chance = res.data.chance;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
      this.loading = false;
    },
  },
};
</script>

<style scoped>
.card,
.mySwiper {
  box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card,
.mySwiper {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid rgba(0, 0, 0, 0.125);
  border-radius: 1rem;
}
.text-reset {
  --bs-text-opacity: 1;
  color: inherit !important;
}
a {
  color: #ff7c00;
  text-decoration: none;
}

.mySwiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
}

.swiper-slide img {
  display: block;
  width: 100%;
}

@media only screen and (min-width: 600px) {
  .mySwiper {
    width: 100%;
    height: 450px;
  }
  .swiper-slide img {
    display: block;
    width: 100%;
    height: 450px;
  }
}
</style>
