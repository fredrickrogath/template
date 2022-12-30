<template>
    <v-card
    :dark="isDark"
      class="pa-12"
      flat
    >
      <v-card
        elevation="12"
        width="256"
      >
        <v-navigation-drawer
          floating
          permanent
        >
          <v-list
            dense
            rounded
          >
            <v-list-item
              v-for="item in items"
              :key="item.title"
              link
            >
              <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon>
  
              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
      </v-card>
    </v-card>
  </template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<script>
  export default {
    data () {
      return {
        items: [
          { title: 'Home', icon: 'mdi-view-dashboard' },
          { title: 'About1', icon: 'mdi-forum' },
          { title: 'About2', icon: 'mdi-forum' },
          { title: 'About3', icon: 'mdi-forum' },
          { title: 'About4', icon: 'mdi-forum' },
          { title: 'About5', icon: 'mdi-forum' },
          { title: 'About6', icon: 'mdi-forum' },
          { title: 'About7', icon: 'mdi-forum' },
          { title: 'About8', icon: 'mdi-forum' },
        ],
      }
    },
  }
</script>