export default {
  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: 'Sanctum_front',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [
  ],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [
  ],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'cookie-universal-nuxt',
  ],

  axios: {
    baseURL: 'http://127.0.0.1:8000/api',
    credentials: true
  },

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: 'auth/login', method: 'post' },
          user: { url: 'auth/user', method: 'get', propertyName: false },
          logout: { url: 'auth/logout', method: 'post' }
        },
        tokenRequired: false,
        tokenType: false
      }
    },
    redirect: {
      logout: '/login'
    }
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {
  }
}
