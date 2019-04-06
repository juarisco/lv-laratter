<template>
  <div class="dropdown-menu">
    <a
      class="dropdown-item"
      v-for="(notification,index) in notifications"
      :key="index.notification"
      :href="'/'+notification.data.follower.username"
    >@{{ notification.data.follower.username }} te ha seguido!</a>
  </div>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      notifications: []
    };
  },
  mounted() {
    axios.get("/api/notifications").then(response => {
      this.notifications = response.data;
    });
  }
};
</script>

<style>
</style>
