<template>
  <div>
    <div class="flex-auto h-full">
      <div class="title md:text-center pt-20 text-purple-600">
        <h1>Let's have a Chat</h1>
      </div> 
      <div class="text-center space-x-12 pt-20">
        <NuxtLink to="/Login" class = "bg-purple-600 text-white font-semibold py-2 px-10 w-full rounded">Login</NuxtLink>
        <NuxtLink to="/Register" class = "bg-purple-600 text-white font-semibold py-2 px-10 w-full rounded">Register</NuxtLink>
        <button @click="logout">Logout</button>
      </div>
    </div> 
  </div>   
</template>

<script>
  export default {
    methods: {
      async login() {
        await this.$axios.get('/../sanctum/csrf-cookie')

        this.$router.push({
            path: '/login'
        })

      },

      async logout() {
         await this.$auth.logout();
      }
    }
  }
  
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family:
    'Quicksand',
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
