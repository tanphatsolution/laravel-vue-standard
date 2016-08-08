import Vue from 'vue'
import VueRouter from 'vue-router'
import Progress from 'vue-progressbar'
import VueResource from 'vue-resource'
import Routes from './routes'
require('es6-promise').polyfill()
Vue.use(VueRouter)
Vue.use(VueResource)
Vue.use(Progress)

const router = new VueRouter({
  history: true,
  saveScrollPosition: false,
  transitionOnLoad: true
})

Vue.http.interceptors.push({
  request (request) {
    this.$progress.start()
    return request
  },

  response (response) {
    this.$progress.finish()
    return response
  }
})

Routes.route(router)

const App = Vue.extend(require('./app.vue'))

router.start(App, '#app')

window.$router = router