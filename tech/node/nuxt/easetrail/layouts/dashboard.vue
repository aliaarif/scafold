<script setup>
</script>
<template>
  <section class="mx-1">
    <DefaultNav :firstParam="useRouter()"/>
    <div class="container-inner">
      <slot />
    </div>
  </section>
</template>
<style>
.page-entter-active,
.page-leave-active {
  transition: all 0.4s;
}
.page-entter-from,
.page-leave-to {
  opacity: 0;
  filter: blur(1rem);
}
</style>
