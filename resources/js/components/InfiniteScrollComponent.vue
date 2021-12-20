
<template>
<div>

 <h1 class="title-text">Vue-Scroll-Loader</h1>
  <div class="images-container row">
      <div class="col-md-3" v-for="(image,index) of images" :key="index">
    <div class="images-item " >
      <div class="">
        <img class="img" :src="image.urls.small" @load="masks.push(index)">
        <div class="images-card__mask" :style="{'background-color':image.color}" v-if="!masks.includes(index)"></div>
      </div>
    </div>
    </div>
  </div>
  <div class="copyright-container" v-if="disable">
    <a class="copyright-container__link" href="https://github.com/molvqingtai">
      <p class="copyright-container__text">By molvqingtai</p>
      <img class="copyright-container__icon" src="./assets/github.png">
    </a>
  </div>

<!-- Replace the default loading animation with slot -->
<scroll-loader :loader-method="getImageList" :loader-disable="disable">
  </scroll-loader>

</div>
</template>

<script>


export default {

  data () {
    return {
      disable: false,
      page: 1,
      pageSize: 30,
      images: [],
      masks: []
    }
  },
  methods: {
    getImageList () {
      axios.get('https://api.unsplash.com/photos', {
        params: {
          page: this.page++,
          per_page: this.pageSize,
          client_id: 'e874834b096dcd107c232fe4b0bb521158b62e486580c988b0a75cb0b77a2abe'
        }
      }).then(res => {
        res.data && (this.images = [...this.images, ...res.data])
      }).catch(error => {
        console.log(error)
      })
    }
  },
  watch: {
    page (value) {
      this.disable = value > 10
    }
  }
}
</script>
