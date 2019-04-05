<template>
  <div class="row">
    <a href="#" class="btn btn-outline-primary" @click="load">Ver Respuestas</a>
    <div class="col-12 mt-2" v-for="(response,index) in responses" :key="index.response">
      <div class="card">
        <div class="card-header">by {{ response.user.name }}</div>
        <div class="card-body">{{ response.message }}</div>
        <div class="card-footer text-muted">{{ response.created_at }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["message"],
  data() {
    return {
      responses: []
    };
  },
  methods: {
    load() {
      axios.get(`/api/messages/${this.message}/responses`).then(res => {
        this.responses = res.data;
      });
    }
  }
};
</script>

<style>
</style>
