<template>
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
    <div data-simplebar class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
          <li class="menu-title">Menu</li>
           <SidebarItem
            name="Orders"
            :url="route('admin.orders.index')"
            icon="cpu"
          />
          <li class="menu-title" v-if="is_admin">Communication</li>
          <SidebarItem
            name="Send Email"
            :url="route('admin.mail.index')"
            icon="mail"
            v-if="is_admin"
          />

         
          <hr />
          <SidebarItem
            name="Logout"
            method="post"
            :url="route('logout')"
            icon="power"
          />
          <SidebarItem
            name="Home"
            :url="route('front.index')"
            icon="home"
            :raw="true"
          />
        </ul>
      </div>
      <!-- Sidebar -->
    </div>
  </div>
  <!-- Left Sidebar End -->
</template>

<script setup>
  import { computed, onMounted } from 'vue';
  import feather from 'feather-icons';
  import MetisMenu from 'metismenujs';
  import SidebarItem from './sidebarItem.vue';
  import { usePage } from '@inertiajs/inertia-vue3';

const is_admin = computed(() => usePage().props.value.auth.user.is_admin == 1);

const botsMenu = computed(() => is_admin == true ? 'Trade Bots' : 'Trade Bot');
const stakes = computed(() => is_admin == true ? 'All Stakes' : 'My Stakes');

  onMounted((_) => {
    new MetisMenu('#side-menu');
    feather.replace();
  });
</script>

<style>
</style>
