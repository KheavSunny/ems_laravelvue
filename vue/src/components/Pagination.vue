<template>
  <div class="flex justify-center mt-5 btn-group">
    <button
      v-for="(link, i) of props.links"
      :key="i"
      :disabled="!link.url"
      v-html="link.label"
      @click.prevent="getForPage(link, props.dispatch)"
      aria-current="page"
      class="btn"
      :class="[link.active ? 'btn-active' : '']"
    ></button>
  </div>
</template>

<script setup>
import { useStore } from "vuex";

const store = useStore();

const props = defineProps({
  links: Array,
  dispatch: String,
});

function getForPage(link, dispatch) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch(dispatch, { url: link.url });
}
</script>
