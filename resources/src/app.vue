<template>
    <div>
      <div class="background">
          <div id="app">
      </div>
      <PrimaryHeader />
      <main class="main">
        <router-view />
      </main>
    </div>
  </div>
  </template>
  
  <script lang="ts">
  
      import { defineComponent } from 'vue';
      import PrimaryHeader from './components/PrimaryHeader.vue';
  
      export default defineComponent({
          components: {
              PrimaryHeader,
          },
          setup() {
              return {
              
              };
          },
      });
  
  </script>
  
  <style lang="less" scoped>
  
  .background {
    height: 100vh;
    width: 100vw;
    background-color: #0e3070;
  }
  
  </style>