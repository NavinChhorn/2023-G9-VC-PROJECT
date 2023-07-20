<template>
  <div class="sidebarleft">
    <div class="icon">
      <v-icon size="large" color="white" icon="mdi-bell"></v-icon>
    </div>
    <v-tabs v-if="userName==null">
      <router-link class="link-sign-up" to="/signUp"
        ><v-tab>SignUp</v-tab></router-link
      >
      <router-link class="link-log-in" to="/logIn"
        ><v-tab>SignIn</v-tab></router-link
      >
    </v-tabs>
    <Menu v-if="userName!=null" :show-menu="showMenu"  @submitLogOut="submitLogOut" :userName="userName"/>
  </div>
</template>

<script>
import Cookies from "js-cookie";
import Menu from './Menu.vue';
export default {
  name: "App",
  components: {
    Menu
  },
  emits: ["submitLogOut"],
  data() {
    return {
      userName: null,
      userId: "",
      showMenu: false,
    };
  },
  methods: {
    // copy https://stackoverflow.com/questions/52021405/vue-js-laravel-handle-logout-correctly
    setUser() {
      // Get the value of the "userData" cookie
      const userData = Cookies.get("submitLogOut");
      // If the "userData" cookie exists, parse it and set the user ID in the component data
      if (userData) {
        const userDataObj = JSON.parse(userData);
        this.userName = userDataObj.data.name;
        this.userId = userDataObj.data;
      }
    },
  },
  mounted() {
    this.setUser();
  },
};
</script>

<style scoped>
.sidebarleft {
  display: flex;
  justify-content: start;
  align-items: start;
  margin-right: 1%;
}
.icon {
  margin-right: 0%;
  margin-top: 4%;
}
.img-icon {
  display: flex;
}

.link-sign-up,
.link-log-in {
  color: #fff;
  text-decoration: none;
  margin-left: 5%;
}
</style>