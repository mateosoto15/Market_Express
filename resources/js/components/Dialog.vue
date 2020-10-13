<template>
  <div class="text-center">
    <v-btn
      :disabled="dialog"
      :loading="dialog"
      class="white--text"
      color="purple darken-2"
      @click="dialog = true"
    >
      Start loading
    </v-btn>
    <v-dialog
      v-model="dialog"
      hide-overlay
      persistent
      width="300"
    >
      <v-card
        color="dark"
      >
        <v-card-text>
          Please stand by
          <v-progress-linear
            indeterminate
            color="dark"
            class="mb-0"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  export default {
    props: ['dialog_'],
    data() {
            return {
                dialog: false
            }
        },
  };
</script>