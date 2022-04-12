<template>
  <div :class="'tw-w-7/9 tw-h-80 tw-rounded-2xl flex-center '+bgColor">
    <div class="flex-col-center">
        <p class="tw-text-3xl tw-font-bold tw-mb-10"> {{title}}</p>
        <slot name="button"></slot>
    </div>
    <div>
        <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
    props:["bgColor","title"]
}
</script>

<style>

</style>